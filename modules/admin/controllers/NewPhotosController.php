<?php

namespace app\modules\admin\controllers;

use Yii;
use app\components\AccessRule;
use app\models\Categories;
use app\models\NewPhotos;
use app\models\SearchNewPhotos;
use app\models\Users;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class NewPhotosController extends Controller {

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

        $searchModel = new SearchNewPhotos();

        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', ['searchModel' => $searchModel, 'dataProvider' => $dataProvider]);

    }

    public function actionView($id) {

        return $this->render('view', ['model' => $this->findModel($id)]);

    }

    public function actionCreate() {

        $model = new NewPhotos();

        $model->status = 1;

        $model->scenario = 'create';

        $mainCats = Categories::findForMainList();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            return $this->redirect(['view', 'id' => $model->id]);

        }

        return $this->render('create', ['model' => $model, 'mainCats' => $mainCats]);

    }

    public function actionUpdate($id) {

        $model = $this->findModel($id);

        $model->scenario = 'update';

        $mainCats = Categories::findForMainList();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            return $this->redirect(['view', 'id' => $model->id]);

        }

        return $this->render('update', ['model' => $model, 'mainCats' => $mainCats]);

    }

    public function actionDelete($id) {

        $this->findModel($id)->delete();

        return $this->redirect(['index']);

    }

    protected function findModel($id) {

        if (($model = NewPhotos::findOne($id)) !== null) {

            return $model;

        }

        throw new NotFoundHttpException('The requested page does not exist.');

    }
    
}
