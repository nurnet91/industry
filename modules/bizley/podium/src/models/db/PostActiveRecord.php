<?php

namespace app\modules\bizley\podium\src\models\db;


use app\modules\bizley\podium\src\db\ActiveRecord;
use app\modules\bizley\podium\src\helpers\Helper;
use app\modules\bizley\podium\src\models\Forum;
use app\modules\bizley\podium\src\models\PostThumb;
use app\modules\bizley\podium\src\models\Thread;
use app\modules\bizley\podium\src\models\User;
use app\modules\bizley\podium\src\Podium;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveQuery;
use yii\helpers\HtmlPurifier;

/**
 * Post model
 *
 * @author Paweł Bizley Brzozowski <pawel@positive.codes>
 * @since 0.6
 *
 * @property integer $id
 * @property string $content
 * @property integer $thread_id
 * @property integer $forum_id
 * @property integer $author_id
 * @property integer $likes
 * @property integer $dislikes
 * @property integer $updated_at
 * @property integer $created_at
 */
class PostActiveRecord extends ActiveRecord
{
    /**
     * @var bool Subscription flag.
     */
    public $subscribe;

    /**
     * @var string Topic.
     */
    public $topic;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%podium_post}}';
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
            ['topic', 'required', 'message' => t( 'Topic can not be blank.'), 'on' => ['firstPost']],
            ['topic', 'filter', 'filter' => function ($value) {
                return HtmlPurifier::process(trim($value));
            }, 'on' => ['firstPost']],
            ['subscribe', 'boolean'],
            ['content', 'required'],
            ['content', 'filter', 'filter' => function ($value) {
                if (Podium::getInstance()->podiumConfig->get('use_wysiwyg') == '0') {
                    return HtmlPurifier::process(trim($value), Helper::podiumPurifierConfig('markdown'));
                }
                return HtmlPurifier::process(trim($value), Helper::podiumPurifierConfig('full'));
            }],
            ['content', 'string', 'min' => 10],
        ];
    }

    /**
     * Author relation.
     * @return ActiveQuery
     */
    public function getAuthor()
    {
        return $this->hasOne(User::className(), ['id' => 'author_id']);
    }

    /**
     * Thread relation.
     * @return ActiveQuery
     */
    public function getThread()
    {
        return $this->hasOne(Thread::className(), ['id' => 'thread_id']);
    }

    /**
     * Forum relation.
     * @return ActiveQuery
     */
    public function getForum()
    {
        return $this->hasOne(Forum::className(), ['id' => 'forum_id']);
    }

    /**
     * Thumbs relation.
     * @return ActiveQuery
     */
    public function getThumb()
    {
        return $this->hasOne(PostThumb::className(), ['post_id' => 'id'])->where(['user_id' => User::loggedId()]);
    }
}
