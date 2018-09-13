<?php

namespace app\modules\bizley\podium\src\models\db;


use app\modules\bizley\podium\src\db\ActiveRecord;
use yii\db\ActiveQuery;

/**
 * Mod AR
 *
 * @author Paweł Bizley Brzozowski <pawel@positive.codes>
 * @since 0.6
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $forum_id
 */
class ModActiveRecord extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%podium_moderator}}';
    }

    /**
     * Forum relation.
     * @return ActiveQuery
     */
    public function getForum()
    {
        return $this->hasOne(static::className(), ['id' => 'forum_id']);
    }
}
