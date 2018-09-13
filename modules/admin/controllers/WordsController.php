<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\SearchWords;
use app\models\Words;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;

class WordsController extends Controller {

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

        $searchModel = new SearchWords();

        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', ['searchModel' => $searchModel, 'dataProvider' => $dataProvider]);

    }

    public function actionView($id) {

        return $this->render('view', ['model' => $this->findModel($id)]);

    }

    public function actionCreate() {

        $model = new Words();

        $model->status = 1;

        $model->scenario = 'create';

        if ($model->load(Yii::$app->request->post()) AND $model->save()) {

            return $this->redirect(['update', 'id' => $model->id]);

        }

        return $this->render('create', ['model' => $model]);

    }

    public function actionUpdate($id) {

        $model = $this->findModel($id);

        $model->scenario = 'update';

        if ($model->load(Yii::$app->request->post()) AND $model->save()) {

            return $this->redirect(['update', 'id' => $model->id]);

        }

        return $this->render('update', ['model' => $model]);

    }

    public function actionDelete($id) {

        $this->findModel($id)->delete();

        return $this->redirect(['index']);

    }

    protected function findModel($id) {

        if (($model = Words::findOne($id)) !== null) {

            return $model;

        }

        throw new NotFoundHttpException('The requested page does not exist.');

    }

}
