<?php

namespace app\modules\admin\controllers;

use app\models\Categories;
use app\models\Subscribers;
use app\models\UserGroups;
use app\models\Userinfo;
use app\models\Users;
use Yii;
use app\models\Mailer;
use app\models\SearchMailer;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MailerController implements the CRUD actions for Mailer model.
 */
class MailerController extends Controller
{
    /**
     * {@inheritdoc}
     */
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

    /**
     * Lists all Mailer models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SearchMailer();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'users' => Users::selectList(),
        ]);
    }

    /**
     * Displays a single Mailer model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Mailer model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Mailer();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
            'users' => Users::allUsersToList(),

        ]);
    }

    /**
     * Updates an existing Mailer model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $user = ($model->user_group_id == Mailer::USER) ? new Users() : new Subscribers();

        $user = $user->findOne($model->user_id);

        $user = (!empty($user->info)) ? $user->info : $user;

        $user_id = $model->user_id;

        if ($model->load(Yii::$app->request->post())) {
            $model->user_id = $user_id;
                if($model->save()){
                    $user->load(Yii::$app->request->post());

                    $cats = (!empty($user->category_ids) AND is_array($user->category_ids)) ? $user->category_ids : [];
                    $user->category_ids = !empty($cats) ? implode(',', $cats) : '';
                    $user->save();
                }
            return $this->redirect(['update', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'users' => Users::allUsersToList(),
            'subscribers' => Subscribers::allSubscribersToList(),
            'userModel' => $user,
            'categories' => Categories::findForDirection()->all(),
        ]);
    }

    /**
     * Deletes an existing Mailer model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Mailer model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Mailer the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Mailer::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
