<?php use app\models\Directions;
use yii\helpers\ArrayHelper;

$mainCats = Directions::findForMainList();
if ($model->type_id !== null) {
    $mainTypes = \app\models\NewsTypes::findForMainOne($model->type_id);
} else {
    $mainTypes = \app\models\NewsTypes::findForMainList();
}

if (!empty($company->employees)) {
    $employees = ArrayHelper::map($company->employees, 'id', 'fio');
} else {
    $employees = [t('Выберите направлению') => t('Выберите направлению')];
}
?>
<div class="container" style="padding: 40px 0;">
    <!-- <a href="javascript:;" class="gutters" data-fancybox="" data-src="#publishing" data-modal="true">Кликни по мне! :D</a> -->
    <div class="publishing">
        <button data-fancybox-close="" class="header-popup__btn-close  btn-clear"><i class="fa fa-times"
                                                                                     aria-hidden="true"></i></button>
        <?php $form = \yii\widgets\ActiveForm::begin(
            [
                'options' => ['class' => 'publishing-form', 'enctype' => 'multipart/form-data'],
                'action' => '/main/news-update?id=' . $model->id
            ]
        ) ?>
        <div class="publishing-form__title-main  content-text">
            <h2>Изменение публикации</h2>
        </div>
        <div class="row">
            <div class="col-sm-6  col-md-4  content-text  content-text_medium">
                <h3>Направление</h3>
                <?= $form->field($model, 'category_id', [
                    'template' => '
                        {input}
                         <p class=\'help-block help-block-error\'></p>
                        '
                ])->dropDownList($mainCats, ['class' => 'select'])->label(false) ?>
                <p>Выберете направление, к которому относится данная публикация</p>
            </div>
            <div class="col-sm-6  col-md-4  content-text">
                <h3>Тип публикации</h3>
                <?= $form->field($model, 'type_id', [
                    'template' => '
                        {input}
                         <p class=\'help-block help-block-error\'></p>
                        '
                ])->dropDownList($mainTypes, ['class' => 'select'])->label(false) ?>
            </div>
            <div class="col-sm-6  col-md-4  content-text">
                <h3>Название</h3>
                <?= $form->field($model, 'title_ru', [
                    'template' =>
                        '
                                <p class=\'help-block help-block-error\'></p>
                               <div class="input-wrap">
                                  {input}
                              </div>
                                    '
                ])->textInput(['class' => 'input', 'placeholder' => t('Введите название публикации')])->label(false) ?>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="block-margin-adaptive  input-file-wrap  input-file-wrap_main-img">
                    <div class="content-text">
                        <h3>Автор</h3>
                    </div>
                    <div class="input-wrap">
                        <?= $form->field($model, 'author', [
                            'template' =>
                                '
                                <p class=\'help-block help-block-error\'></p>
                               <div class="input-wrap">
                                      <label class="input-wrap__label-file author-search-plus search-minus"><i class="fa fa-search-plus" aria-hidden="true"></i></label>
                                  {input}
                              </div>
                                    '
                        ])->textInput(['class' => 'input  input_with_upload_icon author-search-input', 'placeholder' => t('ФИО, должность, компания, страна')])->label(false) ?>
                    </div>
                    <div class="content-text  content-text_medium">
                        <p class="input-file-wrap__description">Нажимите на поиск что бы указат автора из списка</p>
                        <ul class="input-file-wrap__list  uploadImagesList">
                            <li class="input-file-wrap__item template"><span class="delete-link"
                                                                             title="Удалить">Удалить</span></li>
                        </ul>
                    </div>
                </div>
                <div class="content-text  content-text_medium" id="authorsSelect" style="display:none;">
                    <h3>Cписок Авторов</h3>
                    <?= $form->field($model, 'authors_list', [
                        'template' => '
                        {input}
                         <p class=\'help-block help-block-error\'></p>
                        '
                    ])->dropDownList($employees, ['class' => 'select'])->label(false) ?>
                </div>
                <div class="block-margin-adaptive  input-file-wrap  input-file-wrap_main-img">
                    <div class="content-text">
                        <h3>Аннотация</h3>
                    </div>
                    <div class="input-wrap">
                        <?= $form->field($model, 'anotation_ru', [
                            'template' =>
                                '
                                <p class=\'help-block help-block-error\'></p>
                               <div class="input-wrap">
                                      <label for="news-imagefile" class="input-wrap__label-file  label-anchor"><i class="fa fa-upload" aria-hidden="true"></i></label>
                                      <input type="file" id="news-imagefile" name="News[imageFile]" class="input-file-wrap__input input-file-wrap__input_hidden addImages">
                                  {input}
                              </div>
                                    '
                        ])->textarea(['class' => 'textarea  textarea_small  margin-b-10', 'placeholder' => t('Опишите кратко о чём данная публикация')])->label(false) ?>
                    </div>
                    <div class="content-text  content-text_medium">
                        <?php if (!empty($model->photo)): ?>
                            <p class="input-file-wrap__description input-file-wrap__description_hidden">
                                Изображение: <strong><?= $model->photo; ?></strong>
                            </p>
                            <ul class="input-file-wrap__list uploadImagesList margin-b-20">
                                <li class="input-file-wrap__item visible" data-id="news-imagefile"><img
                                            src="<?= $model->photos ?>"><span class="delete-link" title="Удалить">Удалить</span>
                                </li>
                            </ul>
                        <?php else: ?>

                            <p class="input-file-wrap__description">

                                Вставьте изображение или фото для привлечения дополнительного внимания
                            </p>

                            <ul class="input-file-wrap__list  uploadImagesList">
                                <li class="input-file-wrap__item template"><span class="delete-link" title="Удалить">Удалить</span>
                                </li>
                            </ul>

                        <?php endif; ?>
                        <ul class="input-file-wrap__list  uploadImagesList">
                            <?= $div; ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="block-margin-adaptive">
                    <div class="content-text">
                        <h3>Текст</h3>
                        <?= $form->field($model, 'text_ru')->textarea(['class' => 'textarea  textarea_largest', 'placeholder' => t('Текст')])->label(false) ?>
                    </div>
                </div>
            </div>

        </div>
        <div class="d-flex flex-wrap justify-content-center">
            <button class="button button_blue button_side_margin">Отмена</button>
            <input type="submit" value="Сохранить" class="button button_blue button_side_margin">
        </div>
        <?php \yii\widgets\ActiveForm::end() ?>

    </div>
</div>
<?php
$js = <<<JS
   var div =  $('#authorsSelect');
   var plus = $('.author-search-plus');
    plus.on('click',function (){
       var i =  $(this).children('i');
        if($(this).hasClass('search-minus')){
            div.show();
            i.removeClass('fa-search-plus');
            i.addClass('fa-search-minus') 
        }else {
           i.removeClass('fa-search-minus');
           i.addClass('fa-search-plus');
           div.hide();
        }
        $(this).toggleClass('search-minus');
    });
    var author = $("#news-authors_list");

    author.on('change',function() {
      var input = $('.author-search-input');
      input.val(null);
      var value = $(this).val();
      input.val(value);
    });
    
    var direction = $("#news-category_id");
    
	if(direction.length > 0 && author.length > 0){

		direction.change(function(){
            console.log($(this).val());

			$.ajax({
				url: "/site/direction-author/"+$(this).val(),
				type: "get",
				dataType: "html",
				success: function(data){
					author.html(data);
					author.niceSelect("update");
				}
			});

		});
	}
JS;

$this->registerJs($js);

?>
