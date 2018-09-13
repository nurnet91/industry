<?php

namespace app\modules\admin\controllers;

use app\components\AccessRule;
use app\models\Users;
use Yii;
use app\models\CompanyProfileVariants;
use app\models\SearchCompanyProfileVariants;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

class CompanyProfileVariantsController extends Controller {
    
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

        $searchModel = new SearchCompanyProfileVariants();

        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', ['searchModel' => $searchModel, 'dataProvider' => $dataProvider]);

    }

    public function actionView($id) {

        return $this->render('view', ['model' => $this->findModel($id)]);

    }

    public function actionCreate() {

        $model = new CompanyProfileVariants();

        $model->scenario = 'create';

        if ($model->load(Yii::$app->request->post())) {

            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');

            if ($model->imageFile && $model->validate()) {

                if ($model->upload()) {

                    $model->imageFile = null;

                    $model->save(false);

                    return $this->redirect(['view', 'id' => $model->id]);

                }

            }
        }

        return $this->render('create', ['model' => $model]);

    }

    public function actionUpdate($id) {

        $model = $this->findModel($id);

        $model->scenario = 'update';

        if ($model->load(Yii::$app->request->post())) {

            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');

            if ($model->validate()) {

                if ($model->imageFile) {

                    $model->upload();

                    $model->imageFile = null;
                }

                $model->save(false);

                return $this->redirect(['view', 'id' => $model->id]);

            }
        }

        return $this->render('update', ['model' => $model]);

    }

    public function actionDelete($id) {

        $model = $this->findModel($id);

        $model->deletePhoto();

        $model->delete();

        return $this->redirect(['index']);

    }

    protected function findModel($id) {

        if (($model = CompanyProfileVariants::findOne($id)) !== null) {

            return $model;

        }

        throw new NotFoundHttpException('The requested page does not exist.');

    }
    
}
