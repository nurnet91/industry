<?php

namespace app\modules\bizley\podium\src\widgets\codemirror;

use app\modules\bizley\podium\src\widgets\codemirror\assets\CodeMirrorAsset;
use Yii;
use yii\bootstrap\Html;
use yii\web\View;
use yii\widgets\InputWidget;

/**
 * Podium CodeMirror widget.
 *
 * @author Paweł Bizley Brzozowski <pawel@positive.codes>
 * @since 0.6
 */
class CodeMirror extends InputWidget
{
    /**
     * @var string Editor type to display
     */
    public $type = 'basic';

    /**
     * @inheritdoc
     */
    public function run()
    {
        $this->registerClientScript();
        if ($this->hasModel()) {
            if (empty($this->model->{$this->attribute})) {
                $this->model->{$this->attribute} = "\n\n\n\n\n\n\n\n";
            }
            return Html::activeTextarea($this->model, $this->attribute, ['id' => 'codemirror']);
        }
        if (empty($this->value)) {
            $this->value = "\n\n\n\n\n\n\n\n";
        }
        return Html::textarea($this->name, $this->value, ['id' => 'codemirror']);
    }

    /**
     * Registers widget assets.
     * Note that CodeMirror works without jQuery.
     */
    public function registerClientScript()
    {
        $view = $this->view;
        CodeMirrorAsset::register($view);
        $js = 'var CodeMirrorLabels = {
    bold: "' . t( 'Bold') . '",
    italic: "' . t( 'Italic') . '",
    header: "' . t( 'Header') . '",
    inlinecode: "' . t( 'Inline code') . '",
    blockcode: "' . t( 'Block code') . '",
    quote: "' . t( 'Quote') . '",
    bulletedlist: "' . t( 'Bulleted list') . '",
    orderedlist: "' . t( 'Ordered list') . '",
    link: "' . t( 'Link') . '",
    image: "' . t( 'Image') . '",
    help: "' . t( 'Help') . '",
};var CodeMirrorSet = "' . $this->type . '";';
        $view->registerJs($js, View::POS_BEGIN);
    }
}
