<?php

namespace app\modules\bizley\podium\src\widgets\codemirror\assets;

use yii\web\AssetBundle;

/**
 * CodeMirror Buttons Assets
 *
 * @author Paweł Bizley Brzozowski <pawel@positive.codes>
 * @since 0.6
 */
class CodeMirrorButtonsAsset extends AssetBundle
{
    /**
     * @inheritdoc
     */
    public $sourcePath = '@bower/codemirror-buttons';

    /**
     * @inheritdoc
     */
    public $js = ['buttons.js'];
}
