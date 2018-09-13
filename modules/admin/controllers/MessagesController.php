<?php

namespace app\modules\admin\controllers;

use app\models\UserMessages;
use Yii;
use app\components\AccessRule;
use app\models\Messages;
use app\models\SearchMessages;
use app\models\Users;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class MessagesController extends Controller {
    
    public function behaviors() {

        return [
            'access' => [
                'class' => AccessControl::className(),
                'ruleConfig' => ['class' => AccessRule::className()],
                'rules' => [
                    [
                        'actions' => ['index', 'view', 'create', 'update', 'delete', /*'send',*/ 'text'],
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

    public function actionText($id = 0) {

        if (Yii::$app->request->isAjax) {

            $data = ['title' => '', 'text' => ''];

            if($model = Messages::findOne($id)){
                $data['title'] = $model->title;
                $data['text'] = $model->text;
            }

            return json_encode($data);
            
        }

        throw new NotFoundHttpException('The requested page does not exist.');
        
    }

    // public function actionSend($id) {

    //     $model = $this->findModel($id);

    //     $model->sended++;

    //     if($model->save()){
    //         Yii::$app->session->setFlash('success_message', 'Message sended successfully');
    //     } else {
    //         Yii::$app->session->setFlash('error_messade', 'Message not sended, try again please');
    //     }

    //     return $this->redirect(['index']);
        
    // }

    public function actionIndex() {

        $searchModel = new SearchMessages();

        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', ['searchModel' => $searchModel, 'dataProvider' => $dataProvider]);

    }

    public function actionView($id) {

        return $this->render('view', ['model' => $this->findModel($id)]);

    }

    public function actionCreate() {

        $model = new Messages();

        $modelUserMessages = new UserMessages();

        $model->status = 1;

        if ($model->load(Yii::$app->request->post())) {

            $model->user_id = Yii::$app->user->identity->id;

            if ($model->save()) {

                $modelUserMessages->message_id = $model->id;
                $modelUserMessages->user_id = $model->user_id;

                if ($modelUserMessages->save()) {
                    return $this->redirect(['index']);
                }
            }

        }

        return $this->render('create', ['model' => $model]);

    }

    public function actionUpdate($id) {

        $model = $this->findModel($id);

        $user_id = $model->user_id;

        $modelUserMessages = UserMessages::find()->where(['message_id' => $id])->one();

        if ($model->load(Yii::$app->request->post())) {

            $model->user_id = $user_id;

            if($model->save()){

                $modelUserMessages->message_id = $model->id;
                $modelUserMessages->user_id = $model->user_id;
                $modelUserMessages->readed = 0;

                if ($modelUserMessages->save()) {
                    return $this->redirect(['index']);
                }

            }

        }

        return $this->render('update', ['model' => $model]);

    }

    public function actionDelete($id) {

        $this->findModel($id)->delete();

        UserMessages::find()->where(['message_id' => $id])->one()->delete();

        return $this->redirect(['index']);

    }

    protected function findModel($id) {

        if (($model = Messages::findOne($id)) !== null) {

            return $model;

        }

        throw new NotFoundHttpException('The requested page does not exist.');

    }

}
