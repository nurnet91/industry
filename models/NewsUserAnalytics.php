<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;

/**
 * This is the model class for table "in_news_user_analytics".
 *
 * @property int $id
 * @property int $user_id
 * @property string $ip
 * @property string $last_visit
 * @property string $visit
 */
class NewsUserAnalytics extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'in_news_user_analytics';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id'], 'integer'],
            [['user_id'],'default','value'=>function($e){
                if(!Yii::$app->user->isGuest){
                    return Yii::$app->user->id;
                }
                else{
                    return 0;
                }
            }],
            [['last_visit', 'visit'], 'safe'],
            [['ip'], 'string', 'max' => 255],
        ];
    }
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT =>['visit', 'last_visit'],
                    ActiveRecord::EVENT_AFTER_UPDATE =>['visit'],
                ],
                'value' => new Expression('NOW()'),
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'ip' => 'Ip',
            'last_visit' => 'Last Visit',
            'visit' => 'Visit',
        ];
    }
    public function Analytic(){
        if(!Yii::$app->user->isGuest){
            $user = NewsUserAnalytics::find()->where(['user_id'=>Yii::$app->user->id])->one();
            if(empty($user)){
                 $user = new NewsUserAnalytics();
                 $user->ip = $this->userIp();
                 $user->save();
            }
        }
        else{
            $user = NewsUserAnalytics::find()->where(['ip'=>$this->userIp()])->one();
            if(empty($user)){
                $user = new NewsUserAnalytics();
                $user->ip = $this->userIp();
                $user->save();
            }
        }
        return $user;
    }
    public function userIp(){
        if(!empty(Yii::$app->request->userIP)){
            return Yii::$app->request->userIP;
        }elseif(!empty(Yii::$app->request->userHost)){
            return Yii::$app->request->userHost;
        }else{
            return Yii::$app->request->userAgent;
        }
    }
}
