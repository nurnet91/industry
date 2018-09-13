<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$js = <<<JS
	
	$(document).on('click', '.comments-publication-box__answer.gutters', function () 
	{
		var self = $(this),
			form = $('#reply-block'),
			comment = self.closest('.comment-item');
		
		form.show().detach().appendTo(comment.children('.reply-block'));
	        
		comment.find('.hidden-parent-id').val(comment.attr('data-id'));
	        
		return false;
	});

JS;

$this->registerJs($js);



?>
<?php \yii\widgets\Pjax::begin(
        ['id'=>'pjax-true']
)?>
<div class="comments-publication">
	<div class="container">
		<div class="comments-publication__title content-text">
			<h3><?= t('Комментарии') ?></h3></div>
        <?php foreach ($items as $item): ?>

            <?= $this->render('_comment', [
                'item' => $item,
                'form_model' => $form_model,
                'model' => $model
            ]) ?>

        <?php endforeach; ?>

        <div class="panel panel-default">

            <div class="panel-body">

                <div class="leave-reply">

                    <?php $form = ActiveForm::begin([
                        'options' => [
                            'data-pjax' => true,
                            'timeout'   => true,
                        ],
                        'id'=>'pjax-1',
                        'action' => [
                            $action,
                            'id' => $model->id
                        ],
                    ]); ?>

                    <div class="row">

                        <div class="col-md-6">

                            <?= Html::activeHiddenInput($form_model, 'parent_id', ['class' => 'hidden-parent-id']) ?>

                            <?= $form->field($form_model, 'description')->textarea(['rows' => 5]) ?>

                            <div class="form-group">
                                <?= Html::submitButton(t('Отправит'), ['class' => 'btn btn-success']) ?>
                            </div>

                        </div>

                    </div>

                    <?php ActiveForm::end(); ?>

                </div>

            </div>

        </div>

		<div class="comments-publication__pagination  pagination  pagination_grey  flex  justify-content-center">
            <?=
            \yii\widgets\LinkPager::widget([
                'pagination' => $pagination,
                'options' => [
                    'class' => 'row  justify-content-center  align-items-end',
                    'prevPageLabel' => 'previous',
                    'nextPageLabel' => 'next',
                    'maxButtonCount' => 6,
                ]
            ]);
            ?>
		</div>
		<div class="redactor">
			<img src="/images/images/redactor.jpg" alt="">
		</div>
	</div>
</div>
<div id="reply-block" class="panel panel-default m-b-0" style="display: none;">

    <div class="panel-body">

        <div  class="leave-reply">

            <?php $form = ActiveForm::begin([
                'options' => [
                    'data-pjax' => true,
                    'timeout'   => true,
                ],
                'id'=>'pjax-2',
                'action' => [
                    $action,
                    'id' => $model->id
                ],
            ]); ?>

            <div class="row">

                <div class="col-md-6">

                    <?= Html::activeHiddenInput($form_model, 'parent_id', ['class' => 'hidden-parent-id']) ?>

                    <?= $form->field($form_model, 'description')->textarea(['rows' => 5]) ?>

                    <div class="form-group">
                        <?= Html::submitButton(t('Отправит'), ['class' => 'btn btn-success']) ?>
                    </div>

                </div>

            </div>

            <?php ActiveForm::end(); ?>

        </div>

    </div>
</div>

<?php \yii\widgets\Pjax::end()?>

<?=\app\widgets\CountersJsWidget::widget()?>