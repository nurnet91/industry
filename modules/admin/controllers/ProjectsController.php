<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\Projects;
use app\models\SearchProjects;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class ProjectsController extends Controller {

    public function behaviors() {

        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];

    }

    public function actionIndex() {

        $searchModel = new SearchProjects();

        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', ['searchModel' => $searchModel, 'dataProvider' => $dataProvider]);

    }

    public function actionView($id) {

        return $this->render('view', ['model' => $this->findModel($id)]);

    }

    public function actionCreate() {

        $model = new Projects();

        $model->status = 1;

        $model->scenario = 'create';

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            return $this->redirect(['index']);

        }

        return $this->render('create', ['model' => $model]);

    }

    public function actionUpdate($id) {

        $model = $this->findModel($id);

        $model->scenario = 'update';

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            return $this->redirect(['index']);

        }

        return $this->render('update', ['model' => $model]);

    }

    public function actionDelete($id) {

        $this->findModel($id)->delete();

        return $this->redirect(['index']);

    }

    protected function findModel($id) {

        if (($model = Projects::findOne($id)) !== null) {

            return $model;

        }

        throw new NotFoundHttpException('The requested page does not exist.');

    }

}
