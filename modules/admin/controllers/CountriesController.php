<?php

namespace app\modules\admin\controllers;

use Yii;
use app\components\AccessRule;
use app\models\Countries;
use app\models\SearchCountries;
use app\models\Users;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class CountriesController extends Controller {

    public function behaviors() {

        return [
            'access' => [
                'class' => AccessControl::className(),
                'ruleConfig' => ['class' => AccessRule::className()],
                'rules' => [
                    [
                        'actions' => ['index', 'regions', 'cities', 'view', 'create', 'update', 'delete'],
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

        $searchModel = new SearchCountries();

        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', ['searchModel' => $searchModel, 'dataProvider' => $dataProvider]);

    }

    public function actionRegions($country_id = 0) {
        if (Yii::$app->request->isAjax) {
            if ($country = Countries::findOne($country_id)) {
                return $this->renderAjax('_regions', ['data' => $country->regions]);
            }
            return $this->renderAjax('_regions', ['data' => []]);
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionCities($country_id = 0) {
        if (Yii::$app->request->isAjax) {
            if ($country = Countries::findOne($country_id)) {
                return $this->renderAjax('_cities', ['data' => $country->cities]);
            }
            return $this->renderAjax('_cities', ['data' => []]);
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionView($id) {

        return $this->render('view', ['model' => $this->findModel($id)]);

    }

    public function actionCreate() {

        $model = new Countries();

        $model->status = 1;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            return $this->redirect(['update', 'id' => $model->id]);

        }

        return $this->render('create', ['model' => $model]);

    }

    public function actionUpdate($id) {

        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            return $this->redirect(['update', 'id' => $model->id]);

        }

        return $this->render('update', ['model' => $model]);

    }

    public function actionDelete($id) {

        $model = $this->findModel($id);

        if (!empty($model->regions)) {
            foreach ($model->regions as $region) {
                $region->delete();
            }
        }

        if (!empty($model->cities)) {
            foreach ($model->cities as $city) {
                $city->delete();
            }
        }

        $model->delete();

        return $this->redirect(['index']);

    }

    protected function findModel($id) {

        if (($model = Countries::findOne($id)) !== null) {

            return $model;

        }

        throw new NotFoundHttpException('The requested page does not exist.');

    }

}
