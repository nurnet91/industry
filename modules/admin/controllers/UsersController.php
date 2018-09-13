<?php

namespace app\modules\admin\controllers;

use Yii;
use app\components\AccessRule;
use app\models\CompanyInfo;
use app\models\CompanyProfileVariants;
use app\models\Countries;
use app\models\Messages;
use app\models\SearchUsers;
use app\models\UserMessages;
use app\models\Userinfo;
use app\models\Users;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class UsersController extends Controller {

    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'ruleConfig' => ['class' => AccessRule::className()],
                'rules' => [
                    [
                        'actions' => ['index', 'create', 'update', 'view', 'create-company', 'update-company', 'view-company', 'delete'],
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

        $searchModel = new SearchUsers();

        $param = Yii::$app->request->queryParams;

        $dataProvider = $searchModel->search($param);

        $param[0] = 'index';

        $model = new Messages();

        if ($model->load(Yii::$app->request->post())) {

            $models = $dataProvider->getModels();

            if (!empty($models)) {

                if ($model2 = Messages::findActive()->andWhere(['title' => $model->title, 'text' => $model->text])->one()) {

                    $model = $model2;

                }

                $model->user_id = Yii::$app->user->identity->id;

                if($model->save()){

                        $rows = [];

                        foreach ($models as $key => $value) {

                            $rows[] = [$value->id, $model->id];
                            
                        }
                        
                        Yii::$app->db->createCommand()->batchInsert(UserMessages::tableName(), ['user_id', 'message_id'], $rows)->execute();

                        Yii::$app->session->setFlash('success_message', 'Successfully sended messages to ('.count($rows).') users');

                } else {

                    Yii::$app->session->setFlash('error_message', 'Can not save Message, Try again later');
                    
                }

            } else {

                Yii::$app->session->setFlash('error_message', 'Users did not choosen');

            }

            return $this->redirect(['index']);
            
        }

        $messages = Messages::findList();

        return $this->render('index', ['searchModel' => $searchModel, 'dataProvider' => $dataProvider, 'param' => $param, 'messages' => $messages, 'model' => $model]);

    }

    public function actionView($id) {

        return $this->render('view', ['model' => $this->findModel($id)]);

    }

    public function actionCreate() {

        $model = new Users();

        $model->scenario = 'create';

        $model->status = 1;

        $model2 = new Userinfo();

        $model2->scenario = 'create';

        if ($model->load(Yii::$app->request->post()) AND $model2->load(Yii::$app->request->post())) {

            $model->role_id = Users::ROLE_USER;

            if ($model->validate() AND $model2->validate()) {

                if($model->save()){

                    $model2->user_id = $model->id;

                    $model2->save(false);

                    return $this->redirect(['update', 'id' => $model->id]);
                }
            
            }

        }

        return $this->render('create', ['model' => $model, 'model2' => $model2, 'countries' => Countries::selectList()]);

    }

    public function actionUpdate($id) {

        $model = $this->findModel($id);

        if ($model->role_id != Users::ROLE_USER) {

            throw new NotFoundHttpException('You can not manage this user as user profile');
            
        }

        $model2 = !empty($model->info) ? $model->info : new Userinfo();

        $model2->scenario = 'update';

        if ($model->load(Yii::$app->request->post()) && $model2->load(Yii::$app->request->post())) {

            $model->role_id = Users::ROLE_USER;

            if ($model->validate() AND $model2->validate()) {

                $model->save();

                $model2->user_id = $model->id;

                $model2->save(false);
                
                return $this->redirect(['update', 'id' => $model->id]);

            }

        }

        return $this->render('update', ['model' => $model, 'model2' => $model2, 'countries' => Countries::selectList()]);

    }

    public function actionCreateCompany() {

        $model = new Users();

        $model->scenario = 'create';

        $model->status = 1;

        $model2 = new CompanyInfo();

        $model2->scenario = 'create';

        $variants = CompanyProfileVariants::find()->active()->all();

        $variants = ArrayHelper::map($variants, 'id', 'name');

        if ($model->load(Yii::$app->request->post()) AND $model2->load(Yii::$app->request->post())) {

            $model->role_id = Users::ROLE_COMPANY;

            if ($model->validate() AND $model2->validate()) {
                
                if($model->save()){

                    $model2->user_id = $model->id;

                    $model2->save(false);

                    return $this->redirect(['update-company', 'id' => $model->id]);
                }
            
            }

        }

        return $this->render('create-company', [
            'model' => $model, 
            'model2' => $model2, 
            'countries' => Countries::selectList(),
            'variants' => $variants,
        ]);

    }

    public function actionUpdateCompany($id) {

        $model = $this->findModel($id);

        if ($model->role_id != Users::ROLE_COMPANY) {

            throw new NotFoundHttpException('You can not manage this user as company profile');
            
        }

        $model2 = !empty($model->companyinfo) ? $model->companyinfo : new CompanyInfo();

        $model2->scenario = 'update';

        $variants = CompanyProfileVariants::find()->active()->all();

        $variants = ArrayHelper::map($variants, 'id', 'name');

        if ($model->load(Yii::$app->request->post()) && $model2->load(Yii::$app->request->post())) {

            $model->role_id = Users::ROLE_COMPANY;

            if ($model->validate() AND $model2->validate()) {

                $model->save();

                $model2->user_id = $model->id;

                $model2->save(false);
                
                return $this->redirect(['update-company', 'id' => $model->id]);

            }

        }

        return $this->render('update-company', [
            'model' => $model, 
            'model2' => $model2, 
            'countries' => Countries::selectList(),
            'variants' => $variants,
        ]);

    }

    public function actionDelete($id) {

        $model = $this->findModel($id);

        $info = $model->info;

        if (!empty($info)) {

            $info->delete();

        }

        $companyinfo = $model->companyinfo;

        if (!empty($companyinfo)) {

            $companyinfo->delete();

        }

        $interests = $model->interests;

        if (!empty($interests)) {

            foreach ($interests as $interest) {

                $interest->delete();
                
            }
            
        }

        $model->delete();

        return $this->redirect(['index']);

    }

    protected function findModel($id) {

        if (($model = Users::find()->where(['id' => $id])->andWhere(['!=', 'role_id', Users::ROLE_ADMIN])->one()) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');

    }

}
