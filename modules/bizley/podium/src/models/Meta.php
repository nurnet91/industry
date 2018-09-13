<?php

namespace app\modules\bizley\podium\src\models;


use app\modules\bizley\podium\src\models\db\MetaActiveRecord;
use app\modules\bizley\podium\src\Podium;
use cebe\markdown\GithubMarkdown;

/**
 * Meta model
 * User's meta data.
 *
 * @author Paweł Bizley Brzozowski <pawel@positive.codes>
 * @since 0.1
 *
 * @property string $parsedSignature
 */
class Meta extends MetaActiveRecord
{
    const DEFAULT_TIMEZONE = 'UTC';

    /**
     * Max image sizes.
     */
    const MAX_WIDTH  = 165;
    const MAX_HEIGHT = 165;
    const MAX_SIZE   = 204800;

    /**
     * @var mixed Avatar image
     */
    public $image;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_merge(
            parent::rules(),
            [['image', 'image',
                'mimeTypes' => 'image/png, image/jpeg, image/gif',
                'maxWidth' => self::MAX_WIDTH,
                'maxHeight' => self::MAX_HEIGHT,
                'maxSize' => self::MAX_SIZE],
            ]
        );
    }

    /**
     * Returns signature Markdown-parsed if WYSIWYG editor is switched off.
     * @return string
     * @since 0.6
     */
    public function getParsedSignature()
    {
        if (Podium::getInstance()->podiumConfig->get('use_wysiwyg') == '0') {
            $parser = new GithubMarkdown();
            $parser->html5 = true;
            return $parser->parse($this->signature);
        }
        return $this->signature;
    }
}
