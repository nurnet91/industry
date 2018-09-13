<?php

namespace app\modules\bizley\podium\src\models\db;


use app\modules\bizley\podium\src\db\ActiveRecord;
use app\modules\bizley\podium\src\models\PollAnswer;
use app\modules\bizley\podium\src\models\Thread;
use app\modules\bizley\podium\src\models\User;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveQuery;

/**
 * Poll model
 * Forum polls.
 *
 * @author Paweł Bizley Brzozowski <pawel@positive.codes>
 * @since 0.6
 *
 * @property int $id
 * @property string $question
 * @property int $votes
 * @property int $hidden
 * @property int $end_at
 * @property int $thread_id
 * @property int $author_id
 * @property int $create_at
 * @property int $updated_at
 *
 * @property Thread $thread
 * @property PollAnswer[] $answers
 * @property User $author
 */
class PollActiveRecord extends ActiveRecord
{
    /**
     * @var string poll closing date
     * @since 0.5
     */
    public $end;

    /**
     * @var string[] poll answers
     * @since 0.6
     */
    public $editAnswers = [];

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%podium_poll}}';
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
            [['question', 'votes', 'hidden', 'thread_id', 'author_id'], 'required'],
            ['question', 'string', 'max' => 255],
            ['votes', 'integer', 'min' => 1],
            ['end', 'date', 'format' => 'yyyy-MM-dd', 'timestampAttribute' => 'end_at'],
            ['end_at', 'integer'],
            ['hidden', 'boolean'],
            ['editAnswers', 'each', 'rule' => ['string', 'max' => 255]],
            ['editAnswers', 'requiredAnswers'],
        ];
    }

    /**
     * Filters and validates poll answers.
     */
    public function requiredAnswers()
    {
        $this->editAnswers = array_unique($this->editAnswers);
        $filtered = [];
        foreach ($this->editAnswers as $answer) {
            if (!empty(trim($answer))) {
                $filtered[] = trim($answer);
            }
        }
        $this->editAnswers = $filtered;
        if (count($this->editAnswers) < 2) {
            $this->addError('editAnswers', t( 'You have to add at least 2 options.'));
        }
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'question' => t( 'Question'),
            'votes' => t( 'Number of votes'),
            'hidden' => t( 'Hide results before voting'),
            'end' => t( 'Poll ends at'),
        ];
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
     * Author relation.
     * @return ActiveQuery
     */
    public function getAuthor()
    {
        return $this->hasOne(User::className(), ['id' => 'author_id']);
    }

    /**
     * Answers relation.
     * @return ActiveQuery
     */
    public function getAnswers()
    {
        return $this->hasMany(PollAnswer::className(), ['poll_id' => 'id']);
    }
}
