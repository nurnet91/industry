<?php

namespace app\modules\bizley\podium\src\widgets\codemirror\assets;

use yii\web\AssetBundle;

/**
 * CodeMirror Assets
 *
 * @author Paweł Bizley Brzozowski <pawel@positive.codes>
 * @since 0.6
 */
class CodeMirrorAsset extends AssetBundle
{
    /**
     * @inheritdoc
     */
    public $depends = [
        'app\modules\bizley\podium\src\widgets\codemirror\assets\CodeMirrorLibAsset',
        'app\modules\bizley\podium\src\widgets\codemirror\assets\CodeMirrorExtraAsset',
        'app\modules\bizley\podium\src\widgets\codemirror\assets\CodeMirrorModesAsset',
        'app\modules\bizley\podium\src\widgets\codemirror\assets\CodeMirrorButtonsAsset',
        'app\modules\bizley\podium\src\widgets\codemirror\assets\CodeMirrorConfigAsset'
    ];
}
