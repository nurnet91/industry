<?php

/**
 * Podium Module
 * Yii 2 Forum Module
 * @author Paweł Bizley Brzozowski <pawel@positive.codes>
 * @since 0.1
 */

use app\modules\bizley\podium\src\models\Message;
use app\modules\bizley\podium\src\Podium;
use app\modules\bizley\podium\src\widgets\gridview\ActionColumn;
use app\modules\bizley\podium\src\widgets\gridview\GridView;
use app\modules\bizley\podium\src\widgets\Modal;
use yii\helpers\Html;

$this->title = t( 'Messages Inbox');
$this->params['breadcrumbs'][] = ['label' => t( 'My Profile'), 'url' => ['profile/index']];
$this->params['breadcrumbs'][] = $this->title;

$this->registerJs("$('#podiumModalDelete').on('show.bs.modal', function(e) { var button = $(e.relatedTarget); var url = button.data('url'); $('#deleteUrl').attr('href', url); });");

?>
<div class="row">
    <div class="col-md-3 col-sm-4">
        <?= $this->render('/elements/profile/_navbar', ['active' => 'messages']) ?>
    </div>
    <div class="col-md-9 col-sm-8">
        <?= $this->render('/elements/messages/_navbar', ['active' => 'inbox']) ?>
        <br>
<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'rowOptions' => function ($model) {
        return $model->receiver_status == Message::STATUS_NEW ? ['class' => 'warning'] : null;
    },
    'columns' => [
        [
            'attribute' => 'senderName',
            'label' => t( 'From'),
            'format' => 'raw',
            'value' => function ($model) {
                return $model->message->sender->podiumTag;
            }
        ],
        [
            'attribute' => 'topic',
            'label' => t( 'Topic'),
            'format' => 'raw',
            'value' => function ($model) {
                return Html::a(Html::encode($model->message->topic), ['messages/view-received', 'id' => $model->id], ['data-pjax' => '0']);
            }
        ],
        [
            'attribute' => 'created_at',
            'label' => t( 'Sent'),
            'format' => 'raw',
            'value' => function ($model) {
                return Html::tag('span', Podium::getInstance()->formatter->asRelativeTime($model->message->created_at), [
                    'data-toggle' => 'tooltip',
                    'data-placement' => 'top',
                    'title' => Podium::getInstance()->formatter->asDatetime($model->message->created_at, 'long')
                ]);
            }
        ],
        [
            'class' => ActionColumn::className(),
            'template' => '{view-received} {reply} {delete-received}',
            'buttons' => [
                'view-received' => function ($url) {
                    return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, ActionColumn::buttonOptions([
                        'title' => t( 'View Message')
                    ]));
                },
                'reply' => function ($url) {
                    return Html::a('<span class="glyphicon glyphicon-share-alt"></span>', $url, ActionColumn::buttonOptions([
                        'class' => 'btn btn-success btn-xs',
                        'title' => t( 'Reply to Message')
                    ]));
                },
                'delete-received' => function ($url) {
                    return Html::tag('span', Html::tag('button', '<span class="glyphicon glyphicon-trash"></span>', ActionColumn::buttonOptions([
                        'class' => 'btn btn-danger btn-xs',
                        'title' => t( 'Delete Message')
                    ])), ['data-toggle' => 'modal', 'data-target' => '#podiumModalDelete', 'data-url' => $url]);
                },
            ],
        ]
    ],
]); ?>
    </div>
</div><br>
<?php Modal::begin([
    'id' => 'podiumModalDelete',
    'header' => t( 'Delete Message'),
    'footer' => t( 'Delete Message'),
    'footerConfirmOptions' => ['class' => 'btn btn-danger', 'id' => 'deleteUrl'],
    'size' => Modal::SIZE_SMALL
 ]) ?>
<?= t( 'Are you sure you want to delete this message?') ?>
<?php Modal::end();
