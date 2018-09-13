<?php

namespace app\modules\bizley\podium\src\widgets\editor;

use app\modules\bizley\podium\src\Podium;
use app\modules\bizley\podium\src\widgets\codemirror\CodeMirror;
use app\modules\bizley\podium\src\widgets\quill\QuillBasic;
use yii\widgets\InputWidget;

/**
 * Basic Editor for Podium
 *
 * @author Paweł Bizley Brzozowski <pawel@positive.codes>
 * @since 0.6
 */
class EditorBasic extends InputWidget
{
    /**
     * @var InputWidget
     */
    public $editor;

    /**
     * @inheritdoc
     */
    public function init()
    {
        $config = [
            'model' => $this->model,
            'attribute' => $this->attribute,
            'name' => $this->name,
            'value' => $this->value,
            'options' => $this->options
        ];
        if (Podium::getInstance()->podiumConfig->get('use_wysiwyg') == '0') {
            $this->editor = new CodeMirror($config);
        } else {
            if (empty($this->options)) {
                $config['options'] = ['style' => 'min-height:150px;'];
            }
            $this->editor = new QuillBasic($config);
        }
    }

    /**
     * @inheritdoc
     */
    public function run()
    {
        return $this->editor->run();
    }
}
