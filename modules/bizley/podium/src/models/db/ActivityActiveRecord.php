<?php

namespace app\modules\bizley\podium\src\models\db;

use app\modules\bizley\podium\src\db\ActiveRecord;
use app\modules\bizley\podium\src\models\User;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveQuery;

/**
 * Activity AR.
 *
 * @author Paweł Bizley Brzozowski <pawel@positive.codes>
 * @since 0.6
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $username
 * @property integer $user_role
 * @property string $url
 * @property string $ip
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property User $user
 */
class ActivityActiveRecord extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%podium_user_activity}}';
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [TimestampBehavior::className()];
    }

    /**
     * User relation.
     * @return ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
