<?php

namespace app\modules\admin\controllers;

use Yii;
use app\components\AccessRule;
use app\models\Categories;
use app\models\SearchCategories;
use app\models\Users;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;


class CategoryController extends Controller {

    public function behaviors() {

        return [
            'access' => [
                'class' => AccessControl::className(),
                'ruleConfig' => ['class' => AccessRule::className()],
                'rules' => [
                    [
                        'actions' => ['index', 'view', 'create', 'update', 'delete'],
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

    public function actionIndex() {

        $searchModel = new SearchCategories();

        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $mod = Categories::find()->select(['id', 'name_ru'])->where(['parent_id' => 0])->all();

        $mod = ArrayHelper::map($mod, 'id', 'name_ru');

        return $this->render('index', ['searchModel' => $searchModel, 'dataProvider' => $dataProvider, 'mod' => $mod]);

    }

    public function actionView($id) {

        return $this->render('view', ['model' => $this->findModel($id)]);

    }

    public function actionCreate() {

        $model = new Categories();

        $model->scenario = 'create';

        $model->status = 1;

        if ($model->load(Yii::$app->request->post()) AND $model->save()) {

            return $this->redirect(['update', 'id' => $model->id]);

        }

        return $this->render('create', ['model' => $model, 'category' => Categories::allList()]);

    }

    public function actionUpdate($id) {

        $model = $this->findModel($id);

        $model->scenario = 'update';

        if ($model->load(Yii::$app->request->post()) AND $model->save()) {

            return $this->redirect(['update', 'id' => $model->id]);

        }

        return $this->render('update', ['model' => $model, 'category' => Categories::allList()]);

    }

    public function actionDelete($id) {

        $model = $this->findModel($id);

        $model->delete();

        return $this->redirect(['index']);

    }

    public function getCategory() {
        
        $categories = Categories::find()->all();
        
        $data1 = [0 => 'Родитель'];
        $data2 = ArrayHelper::map($categories, 'id', 'name_ru');
        $data = $data1 + $data2;

        return $data;
    }

    protected function findModel($id) {

        if (($model = Categories::findOne($id)) !== null) {

            return $model;

        }

        throw new NotFoundHttpException('The requested page does not exist.');

    }

}
