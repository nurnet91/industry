<?php

/**
 * Podium Module
 * Yii 2 Forum Module
 * @author Paweł Bizley Brzozowski <pawel@positive.codes>
 * @since 0.1
 */

use app\modules\bizley\podium\src\log\Log;
use app\modules\bizley\podium\src\Podium;
use app\modules\bizley\podium\src\widgets\gridview\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

$this->title = t( 'Logs');
$this->params['breadcrumbs'][] = ['label' => t( 'Administration Dashboard'), 'url' => ['admin/index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<?= $this->render('/elements/admin/_navbar', ['active' => 'logs']); ?>
<br>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'rowOptions' => function($model) {
        switch ($model->level) {
            case 1:  $class = 'danger';  break;
            case 2:  $class = 'warning'; break;
            default: $class = '';
        }
        return ['class' => $class];
    },
    'columns' => [
        [
            'attribute' => 'id',
            'label' => t( 'ID'),
        ],
        [
            'attribute' => 'level',
            'label' => t( 'Level'),
            'encodeLabel' => false,
            'filter' => Log::getTypes(),
            'format' => 'raw',
            'value' => function ($model) {
                $name  = ArrayHelper::getValue(Log::getTypes(), $model->level, 'other');
                switch ($model->level) {
                    case 1:  $class = 'danger';  break;
                    case 2:  $class = 'warning'; break;
                    case 4:  $class = 'info';    break;
                    default: $class = 'default';
                }
                return Html::tag('span', $name, ['class' => 'label label-' . $class]);
            },
        ],
        [
            'attribute' => 'category',
            'label' => t( 'Category'),
            'value' => function ($model) {
                return str_replace('bizley\podium', '', $model->category);
            },
        ],
        [
            'attribute' => 'log_time',
            'label' => t( 'Time'),
            'filter' => false,
            'value' => function ($model) {
                return Podium::getInstance()->formatter->asDatetime(floor($model->log_time), 'medium');
            },
        ],
        [
            'attribute' => 'ip',
            'label' => t( 'IP'),
        ],
        [
            'attribute' => 'message',
            'label' => t( 'Message'),
            'format' => 'raw',
            'value' => function ($model) {
                return nl2br(Html::encode($model->message));
            },
        ],
        [
            'attribute' => 'model',
            'label' => t( 'Model ID'),
            'value' => function ($model) {
                return $model->model !== null ? $model->model : '';
            },
        ],
        [
            'attribute' => 'user',
            'label' => t( 'Who'),
            'value' => function ($model) {
                return $model->user !== null ? $model->user : '';
            },
        ],
    ],
]);
