<?php

namespace app\modules\bizley\podium\src\models\db;


use app\modules\bizley\podium\src\db\ActiveRecord;
use app\modules\bizley\podium\src\models\Thread;
use app\modules\bizley\podium\src\models\User;
use yii\db\ActiveQuery;

/**
 * Subscription model
 *
 * @author Paweł Bizley Brzozowski <pawel@positive.codes>
 * @since 0.6
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $thread_id
 * @property integer $post_seen
 *
 * @property User $user
 * @property Thread $thread
 */
class SubscriptionActiveRecord extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%podium_subscription}}';
    }

    /**
     * User relation.
     * @return ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * Thread relation.
     * @return ActiveQuery
     */
    public function getThread()
    {
        return $this->hasOne(Thread::className(), ['id' => 'thread_id']);
    }
}
