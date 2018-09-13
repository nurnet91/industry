<?php use yii\helpers\Html;
use yii\helpers\Url;

?>
    <?php
    $values = [
        'date' => t('Дата'),
        'title' => t('Название публикации'),
        'type_id' => t('Тип'),
        'views' => t('Рейтинг'),
    ];

    $current = Yii::$app->request->get('sort');

    ?>
<?php ?>
    <div class="company-tender  company-tender_activity  background-color-white">
    <div class="company-tender__title  content-text  content-text_tender">
        <h3><?=t('Публикации')?></h3>
        <p><?=t('В таблице показана информация по вашим объявлениям. На данный момент вы можете разместить объявления о покупке или продаже Б/У оборудования или разместить вакансию. Пожалуйста, выберете необходимое действие по ссылкам после таблице и заполните простую форму')?></p>
    </div>
    <div class="company-table-wrap">
        <table class="company-table">
            <thead class="company-table__thead-title-flex">
            <tr>

                <?php foreach($values as $index=>$value):?>
                <th>
                    <div class="company-table__th-in  company-table__th-in_<?= $index == 'date' ? 'date' : 'type_ads' ?> flex  align-items-center">
                        <?= $value ?>
                        <a href="<?= Html::encode(Url::current(['sort' => $index ?: null])) ?>" class="company-table__ranging  ranging<?= $index == $current ? ' active' : '' ?>">
                            <span class="ranging__span"><i class="fa fa-caret-down"></i></span>
                        </a>
                    </div>
                </th>
                <?php endforeach;?>
            </tr>
            </thead>
            <?php if(!empty($model)):?>
            <tbody>
            <?php foreach($model as $publication):?>
                <tr>
                    <td>
                        <div class="company-table__td-in  company-table__td-in_date"><?=$publication->getDate()?></div>
                    </td>
                    <td>
                        <div class="company-table__td-in  company-table__td-in_news">
                            <a href="<?=Url::to(['/main/publish-update','id'=>$publication->id])?>"><?=$publication->getTitle()?></a>
                        </div>
                    </td>
                    <td>
                        <div class="company-table__td-in  company-table__td-in_type"><?=$publication->getType()?></div>
                    </td>
                    <td>
                        <div class="company-table__td-in  company-table__td-in_rating">
                            <div class="user-actions  user-actions_personal_activity">
                                <div class="user-actions__item  user-actions__item_personal_activity">
                                    <i class="fa fa-thumbs-up" aria-hidden="true"></i>
                                    <span><?=$publication->getCountLikes()?></span>
                                </div>
                                <div class="user-actions__item  user-actions__item_personal_activity">
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                    <span><?=$publication->getView()?></span>
                                </div>
                                <div class="user-actions__item  user-actions__item_personal_activity">
                                    <i class="fa fa-comment" aria-hidden="true"></i>
                                    <span><?=$publication->getCountComments()?></span>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            <?php endforeach;?>
            </tbody>
            <?php endif;?>
        </table>
    </div>
    <div class="content-text content-text_tender  text-center">
        <a href="<?=Url::to('/main/publish-form')?>" class="btn-add  btn-add_activity_page">
            <i class="fa fa-plus" aria-hidden="true"></i>
        </a>
        <p><?=t('Чтобы сделать публикацию, пожалуйста, нажмите кнопку «Сделать новую публикацию». В открывшейся форме выберите выберете Направление, к которому относится данная публикация, затем Тип публикации и заполните Название, Аннотацию (основную суть публикации), скопируйте текст статьи и вставьте изображение или фото для привлечения дополнительного внимания. Или загрузите видео, презентацию или архив фотографий. Также Вы можете просто выслать ссылку на материал – например, на Ваше видео в Youtube')?></p>
    </div>
</div>
