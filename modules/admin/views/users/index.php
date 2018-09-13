<?php

use app\models\Users;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="users-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="pull-left">

        <?=Html::a('Create Users', ['create'], ['class' => 'btn btn-success']) ?>

        <?=Html::a('Create Company', ['create-company'], ['class' => 'btn btn-success']) ?>
        
    </div>
    <div class="pull-left" style="margin-left: 15px;">
        
        <?php if ($dataProvider->getCount() > 0): ?>

            <?=Html::a('Send message to ('.$dataProvider->getCount().') users', "#", [
                'class' => 'btn btn-info', 
                'data-toggle' => 'modal',
                'data-target' => '#MessageModal',
            ]) ?>

        <?php endif ?>

    </div>
    <div class="clearfix"></div>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'username',
            'email:email',
            [
                'attribute' => 'country',
                'value' => function ($m) {

                    return (!empty($m) AND !empty($m->country)) ? $m->country->name : 'Note set';
                    
                }
            ],
            [
                'attribute' => 'region',
                'value' => function ($m) {

                    return (!empty($m) AND !empty($m->region)) ? $m->region->name : 'Note set';
                    
                }
            ],
            [
                'attribute' => 'status',
                'value' => function ($m) {
                    return $m->status > 0 ? '<span class="label label-success">Активный</span>' : '<span class="label label-danger">Не активный</span>';
                },
                'format'=> 'raw',
                'filter'=> Html::activeDropDownList($searchModel, 'status', [1 => 'Активный', 0 => 'Не активный'],['class'=>'form-control','prompt' => '']),
            ],
            [
                'attribute' => 'created_at',
                'value' => function ($m) {
                    $dt = date('d.m.Y H:i', strtotime($m->created_at));
                    return $dt;
                },
            ],
            [
                'attribute' => 'role_id',
                'value' => function ($m) {
                    $role_id = Users::byType($m->role_id);
                    return $role_id;
                },
                'filter' => Html::activeDropDownList($searchModel, 'role_id', Users::rolesWithoutAdmin(), ['class'=>'form-control', 'prompt' => '']),
            ],
            'social_name',            
            [
                'attribute' => 'last_visit',
                'value' => function ($m) {
                    $dt = date('d.m.Y H:i', strtotime($m->last_visit));
                    return $dt;
                },
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}&nbsp;&nbsp;{update}&nbsp;&nbsp;{delete}',
                'buttons' => [
                    'view' => function ($url, $model, $key) {
                        $btn = Html::a('<span class="glyphicon glyphicon-eye-open"></span>', ['users/view', 'id' => $model->id], ['title' => 'Просмотр', 'aria-label' => 'Просмотр', 'data-pjax' => '0']);
                        return $model->role_id != Users::ROLE_ADMIN ? $btn : '';
                    },
                    'update' => function ($url, $model, $key) {
                        $link = '';
                        if ($model->role_id == Users::ROLE_USER) {
                            $link = 'users/update';
                        } elseif ($model->role_id == Users::ROLE_COMPANY) {
                            $link = 'users/update-company';
                        }

                        if (!empty($link)) {
                            return Html::a('<span class="glyphicon glyphicon-pencil"></span>', [$link, 'id' => $model->id], ['title' => 'Редактировать', 'aria-label' => 'Редактировать', 'data-pjax' => '0']);
                        }
                        return '';
                    },
                    'delete' => function ($url, $model, $key) {
                        $btn = Html::a('<span class="glyphicon glyphicon-trash"></span>', ['users/delete', 'id' => $model->id], ['title' => 'Удалить', 'aria-label' => 'Удалить', 'data-pjax' => '0', 'data-confirm' => 'Вы уверены, что хотите удалить этот элемент?', 'data-method' => 'post']);
                        return $model->role_id != Users::ROLE_ADMIN ? $btn : '';
                    },
                ]
            ],
        ],
    ]); ?>
</div>

<?php if ($dataProvider->getCount() > 0): ?>

    <div id="MessageModal" class="modal fade" role="dialog">

        <div class="modal-dialog">

            <div class="modal-content">

                <?php $form = ActiveForm::begin(['method' => "POST", 'action' => Url::toRoute($param)]); ?>
                    <div class="modal-header">

                        <button type="button" class="close" data-dismiss="modal">&times;</button>

                        <h4 class="modal-title">Send Message to (<?=$dataProvider->getCount() ?>) users</h4>

                    </div>

                    <div class="modal-body">

                        <?=$form->field($model, 'this_id')->dropDownlist($messages, ['prompt' => '']) ?>

                        <?=$form->field($model, 'title')->textInput() ?>

                        <?=$form->field($model, 'text')->textarea() ?>
                    
                    </div>

                    <div class="modal-footer">

                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                        <button type="submit" class="btn btn-info" onclick="if(!confirm('Are you sure?')){return false;}">Send</button>

                    </div>

                <?php ActiveForm::end(); ?>

            </div>

        </div>

    </div>

    <?php $this->registerJs("

        var sel = $('#messages-this_id');
        var sel2 = $('#messages-title');
        var sel3 = $('#messages-text');

        // loadMessage(sel.val());

        sel.change(function (){

            loadMessage($(this).val());
            
        });

        function loadMessage(id){

            $.ajax({

                url: '/admin/messages/text/'+id,
                type: 'get',
                dataType: 'json',
                success: function (data){
                    sel2.val(data.title);
                    sel3.val(data.text);
                }
                
            });

        }
        
    "); ?>

<?php endif ?>