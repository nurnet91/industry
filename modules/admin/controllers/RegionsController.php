<?php

namespace app\modules\admin\controllers;

use Yii;
use app\components\AccessRule;
use app\models\Countries;
use app\models\Regions;
use app\models\SearchRegions;
use app\models\Users;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class RegionsController extends Controller {

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

    public function actionIndex($country_id) {

        if ($country = Countries::findOne($country_id)) {

            $searchModel = new SearchRegions();

            $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $country_id);

            return $this->render('index', ['searchModel' => $searchModel, 'dataProvider' => $dataProvider, 'country' => $country]);
            
        }

        throw new NotFoundHttpException('The requested page does not exist.');

    }

    public function actionView($country_id, $id) {

        return $this->render('view', ['model' => $this->findModel($country_id, $id)]);

    }

    public function actionCreate($country_id) {

        if ($country = Countries::findOne($country_id)) {
   
            $model = new Regions();

            $model->status = 1;

            if ($model->load(Yii::$app->request->post())) {

                $model->country_id = $country->id;

                $model->save();

                return $this->redirect(['update', 'country_id' => $country->id, 'id' => $model->id]);

            }

            return $this->render('create', ['model' => $model, 'country' => $country]);

        }

        throw new NotFoundHttpException('The requested page does not exist.');

    }

    public function actionUpdate($country_id, $id) {

        if ($country = Countries::findOne($country_id)) {

            $model = $this->findModel($country->id, $id);

            if ($model->load(Yii::$app->request->post())) {

                $model->country_id = $country->id;

                $model->save();

                return $this->redirect(['update', 'country_id' => $country->id, 'id' => $model->id]);

            }

            return $this->render('update', ['model' => $model, 'country' => $country]);

        }

        throw new NotFoundHttpException('The requested page does not exist.');

    }

    public function actionDelete($country_id, $id) {

        $this->findModel($country_id, $id)->delete();

        return $this->redirect(['index', 'country_id' => $country_id]);

    }

    protected function findModel($country_id, $id) {

        if (($model = Regions::find()->where(['country_id' => $country_id, 'id' => $id])->one()) !== null) {

            return $model;

        }

        throw new NotFoundHttpException('The requested page does not exist.');

    }

}
