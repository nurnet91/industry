<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;

/**
 * This is the model class for table "in_seen_company".
 *
 * @property int $id
 * @property int $user_id
 * @property int $company_id
 * @property string $created_at
 */
class SeenCompany extends \yii\db\ActiveRecord
{
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes'=>[
                    ActiveRecord::EVENT_BEFORE_INSERT =>['created_at'],

                ],
                'value' => new Expression('NOW()'),
            ]
        ];
    }
    public static function tableName()
    {
        return 'in_seen_company';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'company_id'], 'integer'],
            [['user_id'],'default','value' => Yii::$app->user->id],
            [['created_at'], 'safe'],
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
            'company_id' => 'Company ID',
            'created_at' => 'Created At',
        ];
    }
    public function dataLink($id){
        if(!Yii::$app->user->isGuest){
            $find = SeenCompany::find()->andWhere(['user_id'=>Yii::$app->user->id])->andWhere(['company_id'=>$id])->one();
            if(empty($find)){
                $model = new SeenCompany();
                $model->company_id = $id;
                $model->save();
            }else{
                $find->created_at = new Expression('NOW()');
                $find->save();
            }
        }
    }
}
