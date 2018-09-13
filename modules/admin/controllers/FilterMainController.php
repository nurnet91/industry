<?php

namespace app\modules\admin\controllers;

use app\models\FilterThemesAttrParent;
use Yii;
use app\components\AccessRule;
use app\models\Directions;
use app\models\FilterAttributes;
use app\models\FilterEquipmentManufacturers;
use app\models\FilterEquipmentTypes;
use app\models\FilterOperations;
use app\models\FiltersForm;
use app\models\FilterSubThemes;
use app\models\FilterTechnologies;
use app\models\FilterThemes;
use app\models\FilterThemesAttributes;
use app\models\Users;
use app\models\FilterMain;
use app\models\SearchFilterMainEquipment;
use app\models\SearchFilterMainService;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;

/**
 * FilterMainController implements the CRUD actions for FilterMain model.
 */
class FilterMainController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {

        return [
            'access' => [
                'class' => AccessControl::className(),
                'ruleConfig' => ['class' => AccessRule::className()],
                'rules' => [
                    [
                        'actions' => ['index', 'filter', 'service', 'equipment', 'create', 'update', 'delete', 'sorting', 'remove-sort-item'],
                        'allow' => true,
                        'roles' => [Users::ROLE_ADMIN],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];

    }

    /**
     * Lists all FilterMain models.
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->redirect('service');
    }

    public function actionService()
    {
        $searchModel = new SearchFilterMainService();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $directions = Directions::allList();
        $themeList = FilterThemes::allList();

        $FiltersThemeAttrParentList = FilterThemesAttrParent::allList();
        $FiltersThemeAttr = FilterThemesAttributes::allList();
        $FiltersTechnologies = FilterTechnologies::allList();
        $FiltersOperations = FilterOperations::allList();
        $FiltersAttributes = FilterAttributes::allList();

        return $this->render('service', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,

            'directions' => $directions,
            'themeList' => $themeList,

            'FiltersThemeAttrParentList' => $FiltersThemeAttrParentList,
            'FiltersThemeAttr' => $FiltersThemeAttr,
            'FiltersTechnologies' => $FiltersTechnologies,
            'FiltersOperations' => $FiltersOperations,
            'FiltersAttributes' => $FiltersAttributes,
        ]);
    }

    public function actionEquipment()
    {
        $searchModel = new SearchFilterMainEquipment();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);


        $directions = Directions::allList();
        $themeList = FilterThemes::allList();

        $FiltersThemeAttr = FilterThemesAttributes::allList();
        $FiltersThemeAttrParentList = FilterThemesAttrParent::allList();
        $FiltersSubThemes = FilterSubThemes::allList();
        $FiltersTechnologies = FilterTechnologies::allList();
        $FiltersOperations = FilterOperations::allList();
        $FiltersEquipmentType = FilterEquipmentTypes::allList();
        $FiltersEquipmentManufacturer = FilterEquipmentManufacturers::allList();

        return $this->render('equipment', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,

            'directions' => $directions,
            'themeList' => $themeList,

            'FiltersThemeAttrParentList' => $FiltersThemeAttrParentList,
            'FiltersThemeAttr' => $FiltersThemeAttr,
            'FiltersSubThemes' => $FiltersSubThemes,
            'FiltersTechnologies' => $FiltersTechnologies,
            'FiltersOperations' => $FiltersOperations,
            'FiltersEquipmentType' => $FiltersEquipmentType,
            'FiltersEquipmentManufacturer' => $FiltersEquipmentManufacturer,
        ]);
    }

    /**
     * Displays a single FilterMain model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionRemoveSortItem()
    {
        if (Yii::$app->request->isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            $ajax = Yii::$app->request->post();
            $models_ids = array_diff($ajax['ids'], array(''));
            $main_ids = $ajax['main'] ? $ajax['main'] : [];

            $models = [
                Directions::className(),
                FilterThemes::className(),
                FilterThemesAttrParent::className(),
                FilterThemesAttributes::className(),
                FilterSubThemes::className(),
                FilterTechnologies::className(),
                FilterOperations::className(),
                FilterAttributes::className(),
                FilterEquipmentTypes::className(),
                FilterEquipmentManufacturers::className(),
            ];

            $models2 = [
                'direction_id' => Directions::className(),
                'theme_id' => FilterThemes::className(),
                'theme_attr_parent_id' => FilterThemesAttrParent::className(),
                'theme_attr_id' => FilterThemesAttributes::className(),
                'sub_theme_id' => FilterSubThemes::className(),
                'tech_id' => FilterTechnologies::className(),
                'operation_id' => FilterOperations::className(),
                'attributes_id' => FilterAttributes::className(),
                'equipment_type_id' => FilterEquipmentTypes::className(),
                'equipment_manufacturer_id' => FilterEquipmentManufacturers::className(),
            ];

            $filterTree[] = ['filter_name' => $models_ids[0][1], 'id' => $models_ids[0][0]];

            if (count($main_ids) > 0) {
                $filterTree[0]['children'] = $main_ids;
            }

            if ($filterTree) {
                foreach ($filterTree as $item) {
                    if ($item['children']) {
                        foreach ($item['children'] as $key => $child) {
                            foreach ($this->filterId($child) as $qwe) {
                                $filterMain = FilterMain::find()->where($qwe)->all();
                                foreach ($filterMain as $table) {
                                    if ($item['filter_name'] == FilterThemes::className()) {
                                        $table->delete();
                                    } else {
                                        $parent = array_search($item['filter_name'], $models2);
                                        $table->$parent = 0;
                                        foreach ($qwe as $key => $i) {
                                            $table->$key = 0;
                                        }
                                        $table->save();
                                    }
                                }
                            }
                        }
                    } else {
                        $result = $this->filterId($item);
                        $key = array_keys($result[0])[0];
                        $filterMain = FilterMain::find()->where($result[0])->one();
                        $filterMain->$key = 0;
                        $filterMain->save();
                    }
                }
            }

            foreach ($models_ids as $key => $model_id) {
                if (is_int($m = array_search($model_id[1], $models))) {
                    $models[$m]::findOne($model_id[0])->delete();
                } else {
                    return false;
                }
            }

            return true;
        }
        return false;
    }

    public function filterId($item)
    {
        $models = [
            'direction_id' => Directions::className(),
            'theme_id' => FilterThemes::className(),
            'theme_attr_parent_id' => FilterThemesAttrParent::className(),
            'theme_attr_id' => FilterThemesAttributes::className(),
            'sub_theme_id' => FilterSubThemes::className(),
            'tech_id' => FilterTechnologies::className(),
            'operation_id' => FilterOperations::className(),
            'attributes_id' => FilterAttributes::className(),
            'equipment_type_id' => FilterEquipmentTypes::className(),
            'equipment_manufacturer_id' => FilterEquipmentManufacturers::className(),
        ];

        $n_sql = false;
        if ($item['children']) {
            foreach ($item['children'] as $key2 => $secondLevel) {
                if (array_search($secondLevel['filter_name'], $models)) {
                    $n_sql[$key2][array_search($item['filter_name'], $models)] = $item['id'];
                    $n_sql[$key2][array_search($secondLevel['filter_name'], $models)] = $secondLevel['id'];
                    if ($secondLevel['children']) {
                        foreach ($secondLevel['children'] as $key3 => $thirdLevel) {
                            if (array_search($thirdLevel['filter_name'], $models)) {
                                $n_sql[$key3 != $key2 ? $key2 : $key3][array_search($item['filter_name'], $models)] = $item['id'];
                                $n_sql[$key3 != $key2 ? $key2 : $key3][array_search($secondLevel['filter_name'], $models)] = $secondLevel['id'];
                                $n_sql[$key3 != $key2 ? $key2 : $key3][array_search($thirdLevel['filter_name'], $models)] = $thirdLevel['id'];
                                if ($thirdLevel['children']) {
                                    foreach ($thirdLevel['children'] as $key4 => $fourthLevel) {
                                        if (array_search($fourthLevel['filter_name'], $models)) {
                                            $n_sql[$key4 != $key3 ? $key3 : $key4][array_search($item['filter_name'], $models)] = $item['id'];
                                            $n_sql[$key4 != $key3 ? $key3 : $key4][array_search($secondLevel['filter_name'], $models)] = $secondLevel['id'];
                                            $n_sql[$key4 != $key3 ? $key3 : $key4][array_search($thirdLevel['filter_name'], $models)] = $thirdLevel['id'];
                                            $n_sql[$key4 != $key3 ? $key3 : $key4][array_search($fourthLevel['filter_name'], $models)] = $fourthLevel['id'];
                                            if ($fourthLevel['children']) {
                                                foreach ($fourthLevel['children'] as $key5 => $fifthLevel) {
                                                    if (array_search($fifthLevel['filter_name'], $models)) {
                                                        $n_sql[$key5 != $key4 ? $key4 : $key5][array_search($item['filter_name'], $models)] = $item['id'];
                                                        $n_sql[$key5 != $key4 ? $key4 : $key5][array_search($secondLevel['filter_name'], $models)] = $secondLevel['id'];
                                                        $n_sql[$key5 != $key4 ? $key4 : $key5][array_search($thirdLevel['filter_name'], $models)] = $thirdLevel['id'];
                                                        $n_sql[$key5 != $key4 ? $key4 : $key5][array_search($fourthLevel['filter_name'], $models)] = $fourthLevel['id'];
                                                        $n_sql[$key5 != $key4 ? $key4 : $key5][array_search($fifthLevel['filter_name'], $models)] = $fifthLevel['id'];
                                                        if ($fifthLevel['children']) {
                                                            foreach ($fifthLevel['children'] as $key6 => $sixthLevel) {
                                                                if (array_search($sixthLevel['filter_name'], $models)) {
                                                                    $n_sql[$key6 != $key5 ? $key5 : $key6][array_search($item['filter_name'], $models)] = $item['id'];
                                                                    $n_sql[$key6 != $key5 ? $key5 : $key6][array_search($secondLevel['filter_name'], $models)] = $secondLevel['id'];
                                                                    $n_sql[$key6 != $key5 ? $key5 : $key6][array_search($thirdLevel['filter_name'], $models)] = $thirdLevel['id'];
                                                                    $n_sql[$key6 != $key5 ? $key5 : $key6][array_search($fourthLevel['filter_name'], $models)] = $fourthLevel['id'];
                                                                    $n_sql[$key6 != $key5 ? $key5 : $key6][array_search($fifthLevel['filter_name'], $models)] = $fifthLevel['id'];
                                                                    $n_sql[$key6 != $key5 ? $key5 : $key6][array_search($sixthLevel['filter_name'], $models)] = $sixthLevel['id'];
                                                                    if ($sixthLevel['children']) {
                                                                        foreach ($sixthLevel['children'] as $key7 => $seventhLevel) {
                                                                            if (array_search($seventhLevel['filter_name'], $models)) {
                                                                                $n_sql[$key7 != $key6 ? $key6 : $key7][array_search($item['filter_name'], $models)] = $item['id'];
                                                                                $n_sql[$key7 != $key6 ? $key6 : $key7][array_search($secondLevel['filter_name'], $models)] = $secondLevel['id'];
                                                                                $n_sql[$key7 != $key6 ? $key6 : $key7][array_search($thirdLevel['filter_name'], $models)] = $thirdLevel['id'];
                                                                                $n_sql[$key7 != $key6 ? $key6 : $key7][array_search($fourthLevel['filter_name'], $models)] = $fourthLevel['id'];
                                                                                $n_sql[$key7 != $key6 ? $key6 : $key7][array_search($fifthLevel['filter_name'], $models)] = $fifthLevel['id'];
                                                                                $n_sql[$key7 != $key6 ? $key6 : $key7][array_search($sixthLevel['filter_name'], $models)] = $sixthLevel['id'];
                                                                                $n_sql[$key7 != $key6 ? $key6 : $key7][array_search($seventhLevel['filter_name'], $models)] = $seventhLevel['id'];
                                                                            }
                                                                        }
                                                                    }
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
            return $n_sql;
        } else {
            $n_sql[][array_search($item['filter_name'], $models)] = $item['id'];
        }

        return $n_sql;
    }

    public function actionSorting()
    {

        if (Yii::$app->request->isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            $ajax = Yii::$app->request->post();
            $data = $ajax['data'];

            $models = [
                Directions::className(),
                FilterThemes::className(),
                FilterThemesAttrParent::className(),
                FilterThemesAttributes::className(),
                FilterSubThemes::className(),
                FilterTechnologies::className(),
                FilterOperations::className(),
                FilterAttributes::className(),
                FilterEquipmentTypes::className(),
                FilterEquipmentManufacturers::className(),
            ];

            foreach ($data as $key => $item) {

                if (is_int($model = array_search($item['filter_name'], $models))) {
                    $m = $models[$model]::findOne($item['id']);
                    $m->position = $key;
                    $m->save();
                    if ($item['children']) {
                        foreach ($item['children'] as $key => $themes) {
                            if (is_int($model = array_search($themes['filter_name'], $models))) {
                                $m = $models[$model]::findOne($themes['id']);
                                $m->position = $key;
                                $m->save();
                                if ($themes['children']) {
                                    foreach ($themes['children'] as $key => $thirdLevel) {
                                        if (is_int($model = array_search($thirdLevel['filter_name'], $models))) {
                                            $m = $models[$model]::findOne($thirdLevel['id']);
                                            $m->position = $key;
                                            $m->save();
                                            if ($thirdLevel['children']) {
                                                foreach ($thirdLevel['children'] as $key => $fourthLevel) {
                                                    if (is_int($model = array_search($fourthLevel['filter_name'], $models))) {
                                                        $m = $models[$model]::findOne($fourthLevel['id']);
                                                        $m->position = $key;
                                                        $m->save();
                                                        if ($fourthLevel['children']) {
                                                            foreach ($fourthLevel['children'] as $key => $fifthLevel) {
                                                                if (is_int($model = array_search($fifthLevel['filter_name'], $models))) {
                                                                    $m = $models[$model]::findOne($fifthLevel['id']);
                                                                    $m->position = $key;
                                                                    $m->save();
                                                                    if ($fifthLevel['children']) {
                                                                        foreach ($fifthLevel['children'] as $key => $sixthLevel) {
                                                                            if (is_int($model = array_search($sixthLevel['filter_name'], $models))) {
                                                                                $m = $models[$model]::findOne($sixthLevel['id']);
                                                                                $m->position = $key;
                                                                                $m->save();
                                                                                if ($sixthLevel['children']) {
                                                                                    foreach ($sixthLevel['children'] as $key => $seventhLevel) {
                                                                                        if (is_int($model = array_search($seventhLevel['filter_name'], $models))) {
                                                                                            $m = $models[$model]::findOne($seventhLevel['id']);
                                                                                            $m->position = $key;
                                                                                            $m->save();
                                                                                        }
                                                                                    }
                                                                                }
                                                                            }
                                                                        }
                                                                    }
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
            $this->refresh();
        }

        return $this->render('sorting', [
            'directions' => Directions::find()->orderBy('position')->all(),
        ]);
    }

    /**
     * Creates a new FilterMain model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @param int $type
     * @return mixed
     */
    public function actionCreate($type = 1)
    {
        $modelFiltersForm = new FiltersForm();
        $modelMain = new FilterMain();

        $postData = Yii::$app->request->post();

        $modelThemes = (FilterThemes::find()->where(['id' => $postData['FilterMain']['theme_id']])->one()) ? FilterThemes::find()->where(['id' => $postData['FilterMain']['theme_id']])->one() : new FilterThemes();
        $modelThemesAttributes = (FilterThemesAttributes::find()->where(['id' => $postData['FilterMain']['theme_attr_id']])->one()) ? FilterThemesAttributes::find()->where(['id' => $postData['FilterMain']['theme_attr_id']])->one() : new FilterThemesAttributes();
        $modelThemesAttributesParent = (FilterThemesAttrParent::find()->where(['id' => $postData['FilterMain']['theme_attr_parent_id']])->one()) ? FilterThemesAttrParent::find()->where(['id' => $postData['FilterMain']['theme_attr_parent_id']])->one() : new FilterThemesAttrParent();
        $modelSubThemes = (FilterSubThemes::find()->where(['id' => $postData['FilterMain']['sub_theme_id']])->one()) ? FilterSubThemes::find()->where(['id' => $postData['FilterMain']['sub_theme_id']])->one() : new FilterSubThemes();
        $modelThemeTech = (FilterTechnologies::find()->where(['id' => $postData['FilterMain']['tech_id']])->one()) ? FilterTechnologies::find()->where(['id' => $postData['FilterMain']['tech_id']])->one() : new FilterTechnologies();
        $modelTechOperation = (FilterOperations::find()->where(['id' => $postData['FilterMain']['operation_id']])->one()) ? FilterOperations::find()->where(['id' => $postData['FilterMain']['operation_id']])->one() : new FilterOperations();
        $modelOperationAttributes = (FilterAttributes::find()->where(['id' => $postData['FilterMain']['attributes_id']])->one()) ? FilterAttributes::find()->where(['id' => $postData['FilterMain']['attributes_id']])->one() : new FilterAttributes();
        $modelEquipmentType = (FilterEquipmentTypes::find()->where(['id' => $postData['FilterMain']['equipment_type_id']])->one()) ? FilterEquipmentTypes::find()->where(['id' => $postData['FilterMain']['equipment_type_id']])->one() : new FilterEquipmentTypes();
        $modelEquipmentManufacturer = (FilterEquipmentManufacturers::find()->where(['id' => $postData['FilterMain']['equipment_manufacturer_id']])->one()) ? FilterEquipmentManufacturers::find()->where(['id' => $postData['FilterMain']['equipment_manufacturer_id']])->one() : new FilterEquipmentManufacturers();

        $modelMain->status = 1;
        $modelMain->theme_attribute = 0;
        $modelMain->type = $type;

        if ($modelFiltersForm->load($postData) && $modelMain->load($postData)) {

            if ($modelFiltersForm->ThemesInput_ru) {
                $modelThemes->name_ru = $modelFiltersForm->ThemesInput_ru;
                $modelThemes->name_en = $modelFiltersForm->ThemesInput_en;
                $modelThemes->name_ua = $modelFiltersForm->ThemesInput_ua;
            }
            $modelThemes->position = $modelFiltersForm->Theme_pos;
            if ($modelThemes->save()) {
                $modelMain->theme_id = $modelThemes->id;
            }
            if ($modelMain->theme_attribute) {
                if ($modelFiltersForm->ThemesAttrParentInput_ru) {
                    $modelThemesAttributesParent->name_ru = $modelFiltersForm->ThemesAttrParentInput_ru;
                    $modelThemesAttributesParent->name_en = $modelFiltersForm->ThemesAttrParentInput_en;
                    $modelThemesAttributesParent->name_ua = $modelFiltersForm->ThemesAttrParentInput_ua;
                }
                $modelThemesAttributesParent->position = $modelFiltersForm->ThemeAttrParent_pos;
                if ($modelThemesAttributesParent->save()) {
                    $modelMain->theme_attr_parent_id = $modelThemesAttributesParent->id;
                }
                if ($modelFiltersForm->ThemesAttrInput_ru) {
                    $modelThemesAttributes->name_ru = $modelFiltersForm->ThemesAttrInput_ru;
                    $modelThemesAttributes->name_en = $modelFiltersForm->ThemesAttrInput_en;
                    $modelThemesAttributes->name_ua = $modelFiltersForm->ThemesAttrInput_ua;
                }
                $modelThemesAttributes->position = $modelFiltersForm->ThemeAttr_pos;
                if ($modelThemesAttributes->save()) {
                    $modelMain->theme_attr_id = $modelThemesAttributes->id;
                }
                $modelMain->save();
                return $this->redirect(['update', 'id' => $modelMain->id]);
            }

            if ($modelMain->type == 1) {
                if ($modelFiltersForm->TechInput_ru) {
                    $modelThemeTech->name_ru = $modelFiltersForm->TechInput_ru;
                    $modelThemeTech->name_en = $modelFiltersForm->TechInput_en;
                    $modelThemeTech->name_ua = $modelFiltersForm->TechInput_ua;
                }
                $modelThemeTech->position = $modelFiltersForm->Tech_pos;
                if ($modelThemeTech->save()) {
                    $modelMain->tech_id = $modelThemeTech->id;
                }
                if ($modelFiltersForm->OperationsInput_ru) {
                    $modelTechOperation->name_ru = $modelFiltersForm->OperationsInput_ru;
                    $modelTechOperation->name_en = $modelFiltersForm->OperationsInput_en;
                    $modelTechOperation->name_ua = $modelFiltersForm->OperationsInput_ua;
                }
                $modelTechOperation->position = $modelFiltersForm->Operation_pos;
                if ($modelTechOperation->save()) {
                    $modelMain->operation_id = $modelTechOperation->id;
                }
                if ($modelFiltersForm->AttributesInput_ru) {
                    $modelOperationAttributes->name_ru = $modelFiltersForm->AttributesInput_ru;
                    $modelOperationAttributes->name_en = $modelFiltersForm->AttributesInput_en;
                    $modelOperationAttributes->name_ua = $modelFiltersForm->AttributesInput_ua;
                }
                $modelOperationAttributes->position = $modelFiltersForm->Attributes_pos;
                if ($modelOperationAttributes->save()) {
                    $modelMain->attributes_id = $modelOperationAttributes->id;
                }
            } elseif ($modelMain->type == 2) {
                if ($modelFiltersForm->SubThemesInput_ru) {
                    $modelSubThemes->name_ru = $modelFiltersForm->SubThemesInput_ru;
                    $modelSubThemes->name_en = $modelFiltersForm->SubThemesInput_en;
                    $modelSubThemes->name_ua = $modelFiltersForm->SubThemesInput_ua;
                }
                $modelSubThemes->position = $modelFiltersForm->SubTheme_pos;
                if ($modelSubThemes->save()) {
                    $modelMain->sub_theme_id = $modelSubThemes->id;
                }
                if ($modelFiltersForm->TechInput_ru) {
                    $modelThemeTech->name_ru = $modelFiltersForm->TechInput_ru;
                    $modelThemeTech->name_en = $modelFiltersForm->TechInput_en;
                    $modelThemeTech->name_ua = $modelFiltersForm->TechInput_ua;
                }
                $modelThemeTech->position = $modelFiltersForm->Tech_pos;
                if ($modelThemeTech->save()) {
                    $modelMain->tech_id = $modelThemeTech->id;
                }
                if ($modelFiltersForm->OperationsInput_ru) {
                    $modelTechOperation->name_ru = $modelFiltersForm->OperationsInput_ru;
                    $modelTechOperation->name_en = $modelFiltersForm->OperationsInput_en;
                    $modelTechOperation->name_ua = $modelFiltersForm->OperationsInput_ua;
                }
                $modelTechOperation->position = $modelFiltersForm->Operation_pos;
                if ($modelTechOperation->save()) {
                    $modelMain->operation_id = $modelTechOperation->id;
                }
                if ($modelFiltersForm->E_TypeInput_ru) {
                    $modelEquipmentType->name_ru = $modelFiltersForm->E_TypeInput_ru;
                    $modelEquipmentType->name_en = $modelFiltersForm->E_TypeInput_en;
                    $modelEquipmentType->name_ua = $modelFiltersForm->E_TypeInput_ua;
                }
                $modelEquipmentType->position = $modelFiltersForm->EType_pos;
                if ($modelEquipmentType->save()) {
                    $modelMain->equipment_type_id = $modelEquipmentType->id;
                }
                if ($modelFiltersForm->ManufacturerInput_ru) {
                    $modelEquipmentManufacturer->name_ru = $modelFiltersForm->ManufacturerInput_ru;
                    $modelEquipmentManufacturer->name_en = $modelFiltersForm->ManufacturerInput_en;
                    $modelEquipmentManufacturer->name_ua = $modelFiltersForm->ManufacturerInput_ua;
                }
                $modelEquipmentManufacturer->position = $modelFiltersForm->Manufacturer_pos;
                if ($modelEquipmentManufacturer->save()) {
                    $modelMain->equipment_manufacturer_id = $modelEquipmentManufacturer->id;
                }
            }

            $modelMain->save();
            return $this->redirect(['update', 'id' => $modelMain->id]);

        }

        $directions = Directions::allList();
        $themeList = FilterThemes::allList();
        $positions = [1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5, 6 => 6, 7 => 7, 8 => 8, 9 => 9, 10 => 10, 11 => 11, 12 => 12];

        return $this->render('create', [
            'model' => $modelMain,
            'modelForm' => $modelFiltersForm,
            'directions' => $directions,
            'positions' => $positions,
            'themeList' => $themeList,
            'modelThemes' => $modelThemes,

        ]);
    }

    /**
     * Updates an existing FilterMain model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $modelFiltersForm = new FiltersForm();
        $modelMain = $this->findModel($id);

        $postData = Yii::$app->request->post();

        $modelThemes = (FilterThemes::findOne($modelMain->theme_id)) ? FilterThemes::findOne($modelMain->theme_id) : new FilterThemes();
        $modelThemesAttributes = FilterThemesAttributes::findOne($modelMain->theme_attr_id) ? FilterThemesAttributes::findOne($modelMain->theme_attr_id) : new FilterThemesAttributes();
        $modelThemesAttributesParent = FilterThemesAttrParent::findOne($modelMain->theme_attr_parent_id) ? FilterThemesAttrParent::findOne($modelMain->theme_attr_parent_id) : new FilterThemesAttrParent();
        $modelSubThemes = FilterSubThemes::findOne($modelMain->sub_theme_id) ? FilterSubThemes::findOne($modelMain->sub_theme_id) : new FilterSubThemes();
        $modelThemeTech = FilterTechnologies::findOne($modelMain->tech_id) ? FilterTechnologies::findOne($modelMain->tech_id) : new FilterTechnologies();
        $modelTechOperation = FilterOperations::findOne($modelMain->operation_id) ? FilterOperations::findOne($modelMain->operation_id) : new FilterOperations();
        $modelOperationAttributes = FilterAttributes::findOne($modelMain->attributes_id) ? FilterAttributes::findOne($modelMain->attributes_id) : new FilterAttributes();
        $modelEquipmentType = FilterEquipmentTypes::findOne($modelMain->equipment_type_id) ? FilterEquipmentTypes::findOne($modelMain->equipment_type_id) : new FilterEquipmentTypes();
        $modelEquipmentManufacturer = FilterEquipmentManufacturers::findOne($modelMain->equipment_manufacturer_id) ? FilterEquipmentManufacturers::findOne($modelMain->equipment_manufacturer_id) : new FilterEquipmentManufacturers();

        if ($modelFiltersForm->load($postData) && $modelMain->load($postData)) {

            if ($modelFiltersForm->ThemesInput_ru) {
                $modelThemes->name_ru = $modelFiltersForm->ThemesInput_ru;
                $modelThemes->name_en = $modelFiltersForm->ThemesInput_en;
                $modelThemes->name_ua = $modelFiltersForm->ThemesInput_ua;
            }
            $modelThemes->position = $modelFiltersForm->Theme_pos;
            if ($modelThemes->save()) {
                $modelMain->theme_id = $modelThemes->id;
            }
            if ($modelMain->theme_attribute) {
                if ($modelFiltersForm->ThemesAttrParentInput_ru) {
                    $modelThemesAttributesParent->name_ru = $modelFiltersForm->ThemesAttrParentInput_ru;
                    $modelThemesAttributesParent->name_en = $modelFiltersForm->ThemesAttrParentInput_en;
                    $modelThemesAttributesParent->name_ua = $modelFiltersForm->ThemesAttrParentInput_ua;
                }
                $modelThemesAttributesParent->position = $modelFiltersForm->ThemeAttrParent_pos;
                if ($modelThemesAttributesParent->save()) {
                    $modelMain->theme_attr_parent_id = $modelThemesAttributesParent->id;
                }
                if ($modelFiltersForm->ThemesAttrInput_ru) {
                    $modelThemesAttributes->name_ru = $modelFiltersForm->ThemesAttrInput_ru;
                    $modelThemesAttributes->name_en = $modelFiltersForm->ThemesAttrInput_en;
                    $modelThemesAttributes->name_ua = $modelFiltersForm->ThemesAttrInput_ua;
                }
                $modelThemesAttributes->position = $modelFiltersForm->ThemeAttr_pos;
                if ($modelThemesAttributes->save()) {
                    $modelMain->theme_attr_id = $modelThemesAttributes->id;
                }
                $modelMain->save();
                return $this->redirect(['update', 'id' => $modelMain->id]);
            }

            if ($modelMain->type == 1) {
                if ($modelFiltersForm->TechInput_ru) {
                    $modelThemeTech->name_ru = $modelFiltersForm->TechInput_ru;
                    $modelThemeTech->name_en = $modelFiltersForm->TechInput_en;
                    $modelThemeTech->name_ua = $modelFiltersForm->TechInput_ua;
                }
                $modelThemeTech->position = $modelFiltersForm->Tech_pos;
                if ($modelThemeTech->save()) {
                    $modelMain->tech_id = $modelThemeTech->id;
                }
                if ($modelFiltersForm->OperationsInput_ru) {
                    $modelTechOperation->name_ru = $modelFiltersForm->OperationsInput_ru;
                    $modelTechOperation->name_en = $modelFiltersForm->OperationsInput_en;
                    $modelTechOperation->name_ua = $modelFiltersForm->OperationsInput_ua;
                }
                $modelTechOperation->position = $modelFiltersForm->Operation_pos;
                if ($modelTechOperation->save()) {
                    $modelMain->operation_id = $modelTechOperation->id;
                }
                if ($modelFiltersForm->AttributesInput_ru) {
                    $modelOperationAttributes->name_ru = $modelFiltersForm->AttributesInput_ru;
                    $modelOperationAttributes->name_en = $modelFiltersForm->AttributesInput_en;
                    $modelOperationAttributes->name_ua = $modelFiltersForm->AttributesInput_ua;
                }
                $modelOperationAttributes->position = $modelFiltersForm->Attributes_pos;
                if ($modelOperationAttributes->save()) {
                    $modelMain->attributes_id = $modelOperationAttributes->id;
                }
            } elseif ($modelMain->type == 2) {
                if ($modelFiltersForm->SubThemesInput_ru) {
                    $modelSubThemes->name_ru = $modelFiltersForm->SubThemesInput_ru;
                    $modelSubThemes->name_en = $modelFiltersForm->SubThemesInput_en;
                    $modelSubThemes->name_ua = $modelFiltersForm->SubThemesInput_ua;
                }
                $modelSubThemes->position = $modelFiltersForm->SubTheme_pos;
                if ($modelSubThemes->save()) {
                    $modelMain->sub_theme_id = $modelSubThemes->id;
                }
                if ($modelFiltersForm->TechInput_ru) {
                    $modelThemeTech->name_ru = $modelFiltersForm->TechInput_ru;
                    $modelThemeTech->name_en = $modelFiltersForm->TechInput_en;
                    $modelThemeTech->name_ua = $modelFiltersForm->TechInput_ua;
                }
                $modelThemeTech->position = $modelFiltersForm->Tech_pos;
                if ($modelThemeTech->save()) {
                    $modelMain->tech_id = $modelThemeTech->id;
                }
                if ($modelFiltersForm->OperationsInput_ru) {
                    $modelTechOperation->name_ru = $modelFiltersForm->OperationsInput_ru;
                    $modelTechOperation->name_en = $modelFiltersForm->OperationsInput_en;
                    $modelTechOperation->name_ua = $modelFiltersForm->OperationsInput_ua;
                }
                $modelTechOperation->position = $modelFiltersForm->Operation_pos;
                if ($modelTechOperation->save()) {
                    $modelMain->operation_id = $modelTechOperation->id;
                }
                if ($modelFiltersForm->E_TypeInput_ru) {
                    $modelEquipmentType->name_ru = $modelFiltersForm->E_TypeInput_ru;
                    $modelEquipmentType->name_en = $modelFiltersForm->E_TypeInput_en;
                    $modelEquipmentType->name_ua = $modelFiltersForm->E_TypeInput_ua;
                }
                $modelEquipmentType->position = $modelFiltersForm->EType_pos;
                if ($modelEquipmentType->save()) {
                    $modelMain->equipment_type_id = $modelEquipmentType->id;
                }
                if ($modelFiltersForm->ManufacturerInput_ru) {
                    $modelEquipmentManufacturer->name_ru = $modelFiltersForm->ManufacturerInput_ru;
                    $modelEquipmentManufacturer->name_en = $modelFiltersForm->ManufacturerInput_en;
                    $modelEquipmentManufacturer->name_ua = $modelFiltersForm->ManufacturerInput_ua;
                }
                $modelEquipmentManufacturer->position = $modelFiltersForm->Manufacturer_pos;
                if ($modelEquipmentManufacturer->save()) {
                    $modelMain->equipment_manufacturer_id = $modelEquipmentManufacturer->id;
                }
            }

            $modelMain->save();
            return $this->redirect(['update', 'id' => $modelMain->id]);

        }

        $directions = Directions::allList();
        $themeList = FilterThemes::allList();

        $allPos = FilterMain::allPosition($id);

        return $this->render('update', [
            'allPos' => $allPos,
            'model' => $modelMain,
            'modelThemes' => $modelThemes,
            'modelForm' => $modelFiltersForm,
            'directions' => $directions,
            'themeList' => $themeList,
        ]);
    }

    /**
     * Deletes an existing FilterMain model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(Yii::$app->request->referrer);
    }

    public function actionFilter($id = 0, $model = '', $modelmain = 0)
    {
        $modelMain = null;
        if ($modelmain > 0) {
            $modelMain = $this->findModel($modelmain);
        }

        if (Yii::$app->request->isAjax) {

            if ($model == 'directions_s') {
                if ($filter = Directions::findOne($id)) {
                    return $this->renderAjax('_filter_form', ['data' => $filter->subsService, 'item_id' => $modelMain->theme_id, 'mName' => 'theme']);
                }
            }

            if ($model == 'directions_e') {
                if ($filter = Directions::findOne($id)) {
                    return $this->renderAjax('_filter_form', ['data' => $filter->subsEquipment, 'item_id' => $modelMain->theme_id, 'mName' => 'theme']);
                }
            }

            if ($model == 'direction_themes') {
                if ($filter = FilterThemes::findOne($id)) {
                    Yii::$app->response->format = Response::FORMAT_JSON;
                    if ($id == 1) {
                        return [
                            'template' => $this->renderAjax('_filter_form', ['data' => $filter->subsServiceAll, 'item_id' => $modelMain->tech_id, 'mName' => 'technology']),
                            'themeImg' => "",
                        ];
                    } else {
                        return [
                            'template' => $this->renderAjax('_filter_form', ['data' => $filter->subsService, 'item_id' => $modelMain->tech_id, 'mName' => 'technology']),
                            'themeImg' => $filter->img == null ? "" : $filter->img,

                        ];
                    }
                }
            }

            if ($model == 'direction_themes_sub') {
                if ($filter = FilterThemes::findOne($id)) {
                    Yii::$app->response->format = Response::FORMAT_JSON;
                    if ($id == 1) {
                        return [
                            'template' => $this->renderAjax('_filter_form', ['data' => $filter->subsEquipmentAll, 'item_id' => $modelMain->sub_theme_id, 'mName' => 'subTheme']),
                            'themeImg' => "",
                        ];
                    } else {
                        return [
                            'template' => $this->renderAjax('_filter_form', ['data' => $filter->subsEquipment, 'item_id' => $modelMain->sub_theme_id, 'mName' => 'subTheme']),
                            'themeImg' => $filter->img == null ? "" : $filter->img,
                        ];
                    }
                }
            }

            if ($model == 'themes_attr_parent') {
                if ($filter = FilterThemes::findOne($id)) {
                    Yii::$app->response->format = Response::FORMAT_JSON;
                    if ($id == 1) {
                        return [
                            'template' => $this->renderAjax('_filter_form', ['data' => $filter->subsServiceAttrParentAll, 'item_id' => $modelMain->theme_attr_parent_id, 'mName' => 'themeAttrParent']),
                            'themeImg' => "",
                        ];
                    } else {
                        return [
                            'template' => $this->renderAjax('_filter_form', ['data' => $filter->subsServiceAttrParent, 'item_id' => $modelMain->theme_attr_parent_id, 'mName' => 'themeAttrParent']),
                            'themeImg' => $filter->img == null ? "" : $filter->img,
                        ];
                    }
                }
            }

            if ($model == 'themes_attr_parent_equipment') {
                if ($filter = FilterThemes::findOne($id)) {
                    Yii::$app->response->format = Response::FORMAT_JSON;
                    if ($id == 1) {
                        return [
                            'template' => $this->renderAjax('_filter_form', ['data' => $filter->subsEquipmentAttrParentAll, 'item_id' => $modelMain->theme_attr_parent_id, 'mName' => 'themeAttrParent']),
                            'themeImg' => "",
                        ];
                    } else {
                        return [
                            'template' => $this->renderAjax('_filter_form', ['data' => $filter->subsEquipmentAttrParent, 'item_id' => $modelMain->theme_attr_parent_id, 'mName' => 'themeAttrParent']),
                            'themeImg' => $filter->img == null ? "" : $filter->img,
                        ];
                    }

                }
            }

            if ($model == 'themes_attr') {
                if ($filter = FilterThemesAttrParent::findOne($id)) {
                    if ($id == 1) {
                        return $this->renderAjax('_filter_form', ['data' => $filter->subsServiceAttrAll, 'item_id' => $modelMain->theme_attr_id, 'mName' => 'themeAttr']);
                    } else {
                        return $this->renderAjax('_filter_form', ['data' => $filter->subsServiceAttr, 'item_id' => $modelMain->theme_attr_id, 'mName' => 'themeAttr']);
                    }
                }
            }

            if ($model == 'themes_attr_equipment') {
                if ($filter = FilterThemesAttrParent::findOne($id)) {
                    if ($id == 1) {
                        return $this->renderAjax('_filter_form', ['data' => $filter->subsEquipmentAttrAll, 'item_id' => $modelMain->theme_attr_id, 'mName' => 'themeAttr']);
                    } else {
                        return $this->renderAjax('_filter_form', ['data' => $filter->subsEquipmentAttr, 'item_id' => $modelMain->theme_attr_id, 'mName' => 'themeAttr']);
                    }
                }
            }

            if ($model == 'sub_themes') {
                if ($filter = FilterSubThemes::findOne($id)) {
                    if ($id == 1) {
                        return $this->renderAjax('_filter_form', ['data' => $filter->subsAll, 'item_id' => $modelMain->tech_id, 'mName' => 'technology']);
                    } else {
                        return $this->renderAjax('_filter_form', ['data' => $filter->subs, 'item_id' => $modelMain->tech_id, 'mName' => 'technology']);
                    }
                }
            }

            if ($model == 'theme_tech') {
                if ($filter = FilterTechnologies::findOne($id)) {
                    if ($id == 1) {
                        return $this->renderAjax('_filter_form', ['data' => $filter->subsAll, 'item_id' => $modelMain->operation_id, 'mName' => 'operation']);
                    } else {
                        return $this->renderAjax('_filter_form', ['data' => $filter->subs, 'item_id' => $modelMain->operation_id, 'mName' => 'operation']);
                    }
                }
            }

            if ($model == 'tech_operations_s') {
                if ($filter = FilterOperations::findOne($id)) {
                    if ($id == 1) {
                        return $this->renderAjax('_filter_form', ['data' => $filter->subsServiceAll, 'item_id' => $modelMain->attributes_id, 'mName' => 'operationAttribute']);
                    } else {
                        return $this->renderAjax('_filter_form', ['data' => $filter->subsService, 'item_id' => $modelMain->attributes_id, 'mName' => 'operationAttribute']);
                    }
                }
            }

            if ($model == 'tech_operations_e') {
                if ($filter = FilterOperations::findOne($id)) {
                    if ($id == 1) {
                        return $this->renderAjax('_filter_form', ['data' => $filter->subsEquipmentAll, 'item_id' => $modelMain->equipment_type_id, 'mName' => 'eType']);
                    } else {
                        return $this->renderAjax('_filter_form', ['data' => $filter->subsEquipment, 'item_id' => $modelMain->equipment_type_id, 'mName' => 'eType']);
                    }
                }
            }

            if ($model == 'equipment_type') {
                if ($filter = FilterEquipmentTypes::findOne($id)) {
                    if ($id == 1) {
                        return $this->renderAjax('_filter_form', ['data' => $filter->subsAll, 'item_id' => $modelMain->equipment_manufacturer_id, 'mName' => 'eManufacturer']);
                    } else {
                        return $this->renderAjax('_filter_form', ['data' => $filter->subs, 'item_id' => $modelMain->equipment_manufacturer_id, 'mName' => 'eManufacturer']);
                    }
                }
            }

            return $this->renderAjax('_filter_form', ['data' => []]);

        }

        return $this->redirect(!empty(Yii::$app->request->referrer) ? Yii::$app->request->referrer : '/');

    }


    /**
     * Finds the FilterMain model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return FilterMain the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($modelFiltersForm = FilterMain::findOne($id)) !== null) {
            return $modelFiltersForm;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
