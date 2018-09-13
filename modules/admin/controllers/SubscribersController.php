<?php

namespace app\modules\admin\controllers;

use app\models\Categories;
use app\models\Directions;
use Yii;
use app\models\Subscribers;
use app\models\SearchSubscribers;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class SubscribersController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $searchModel = new SearchSubscribers();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionCreate()
    {
        $model = new Subscribers();

        if ($model->load(Yii::$app->request->post())) {

            $cats = (!empty($model->category_ids) AND is_array($model->category_ids)) ? $model->category_ids : [];
            $model->category_ids = !empty($cats) ? implode(',', $cats) : '';

            $model->save();
            return $this->redirect(['create', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
            'categories' => Directions::find()->all()
        ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $cats = (!empty($model->category_ids) AND is_array($model->category_ids)) ? $model->category_ids : [];
            $model->category_ids = !empty($cats) ? implode(',', $cats) : '';

            $model->save();
//            dd($model->category_ids);
//            $model->errors
            return $this->redirect(['update', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'categories' => Categories::findForDirection()->all(),
        ]);
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = Subscribers::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
