<?php

namespace app\modules\bizley\podium\src\models\db;

use app\modules\bizley\podium\src\db\ActiveRecord;
use app\modules\bizley\podium\src\helpers\Helper;
use yii\helpers\HtmlPurifier;

/**
 * Content AR
 *
 * @author Paweł Bizley Brzozowski <pawel@positive.codes>
 * @since 0.6
 *
 * @property integer $id
 * @property string $name
 * @property string $topic
 * @property string $content
 */
class ContentActiveRecord extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%podium_content}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['content', 'topic'], 'required'],
            [['content', 'topic'], 'string', 'min' => 1],
            ['topic', 'filter', 'filter' => function ($value) {
                return HtmlPurifier::process(trim($value));
            }],
            ['content', 'filter', 'filter' => function ($value) {
                return HtmlPurifier::process(trim($value), Helper::podiumPurifierConfig('full'));
            }],
        ];
    }
}
