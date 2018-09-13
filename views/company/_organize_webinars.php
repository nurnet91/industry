<?php
$webinars = $model->companyinfo->activeWebinars;
?>
<?php if(!empty($webinars)):?>

<div class="organize-webinar organize-webinar_company">
    <div class="content-text  content-text_medium">
        <h3>Планируемые вебинары</h3>
        <p>При необходимости Вы можете внести изменения в планируемых вебинарах</p>
    </div>
    <div class="company-table-wrap">
           <table class="company-table  company-table_planing_webinar">
            <thead>
            <tr>
                <th><div class="company-table__td-in">Дата</div></th>
                <th><div class="company-table__td-in">О вебинаре</div></th>
                <th><div class="company-table__td-in">Организатор</div></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($webinars as $webinar):?>
            <tr>
                <td>
                    <div class="company-table__td-in">
                        <?=$webinar->getDate();?>
                        <span class="color-light-grey"><?=$webinar->getTimes()?></span>
                        <span class="color-light-grey"><?=$webinar->getTimeDuration()?></span>

                    </div>
                </td>
                <td>
                    <div class="company-table__td-in">
                        <div class="row">
                            <div class="company-table__title-planing-webinar  content-text  content-text_medium  gutters">
                                <h4><?=$webinar->getTopic()?></h4>
                                <p><?=$webinar->getSpeakerFio()?></p>
                            </div>
                            <div class="gutters">
                                <a href="<?=$webinar->getLinkFile()?>" class="company-table-icon  company-table-icon_download" data-toggle="tooltip" data-placement="top" title="Скачать программу вебинара"><i class="fa fa-download" aria-hidden="true"></i></a>
                                <a href="<?=$webinar->getLinkRedactor()?>" class="company-table-icon  company-table-icon_edit"  data-toggle="tooltip" data-placement="top" title="Внести изменения"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                            </div>
                        </div>
                        <div class="company-table__content-planing-webinar  content-text">
                            <p><?=$webinar->getAnnotation()?></p>
                        </div>
                    </div>
                </td>
                <td>
                    <div class="company-table__td-in">
                        <div class="company-table__title-planing-webinar  company-table__title-planing-webinar_else  content-text  text-center">
                            <h4><?=$webinar->getOrganizerFio()?></h4>
                            <a href="tel:<?=$webinar->getPhone()?>"><?=$webinar->getPhone()?></a>
                            <a href="mailto:<?=$webinar->getEmail()?>"><?=$webinar->getEmail()?></a>
                        </div>
                    </div>
                </td>
            </tr>
            <?php endforeach;?>

            </tbody>
        </table>
    </div>
</div>
<?php endif;?>

