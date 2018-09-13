<?php

namespace app\modules\bizley\podium\src\models\db;


use app\modules\bizley\podium\src\db\ActiveRecord;
use app\modules\bizley\podium\src\helpers\Helper;
use app\modules\bizley\podium\src\Podium;
use yii\behaviors\TimestampBehavior;
use yii\helpers\HtmlPurifier;

/**
 * Meta AR
 *
 * @author Paweł Bizley Brzozowski <pawel@positive.codes>
 * @since 0.6
 *
 * @property int $id
 * @property int $user_id
 * @property string $location
 * @property string $signature
 * @property int $gravatar
 * @property string $avatar
 * @property string $timezone
 * @property int $anonymous
 * @property int $created_at
 * @property int $updated_at
 */
class MetaActiveRecord extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%podium_user_meta}}';
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [TimestampBehavior::className()];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['location', 'signature'], 'trim'],
            ['location', 'filter', 'filter' => function ($value) {
                return HtmlPurifier::process(trim($value));
            }],
            ['gravatar', 'boolean'],
            ['signature', 'filter', 'filter' => function ($value) {
                if (Podium::getInstance()->podiumConfig->get('use_wysiwyg') == '0') {
                    return HtmlPurifier::process(trim($value), Helper::podiumPurifierConfig('markdown'));
                }
                return HtmlPurifier::process(trim($value), Helper::podiumPurifierConfig());
            }],
            ['signature', 'string', 'max' => 512],
            ['timezone', 'match', 'pattern' => '/[\w\-]+/'],
            ['anonymous', 'boolean'],
        ];
    }
}
