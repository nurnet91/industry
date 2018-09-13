<?php
$webinars = $model->companyinfo->passedWebinars;
?>
<?php if(!empty($webinars)):?>

<div class="organize-webinar organize-webinar_company">
    <div class="content-text  content-text_medium">
        <h3>Проведенные вебинары</h3>
    </div>
    <div class="company-table-wrap">
              <table class="company-table  company-table_comleted_webinar">
            <thead>
            <tr>
                <th><div class="company-table__td-in">Дата</div></th>
                <th><div class="company-table__td-in">О вебинаре</div></th>
                <th colspan="2"><div class="company-table__td-in">Организатор</div></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($webinars as $webinar):?>
            <?php if($webinar->status !=\app\models\Webinars::STATUS_PASSED){continue;}?>
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
                <td>
                    <div class="company-table__td-in">
                        <div class="user-actions  user-actions_webinars">
                            <div class="user-actions__item">
                                <i class="fa fa-users" aria-hidden="true"></i>
                                <a href="<?=$webinar->getLinkUsers()?>"><?=$webinar->getCountUsers()?></a>
                            </div>
                            <div class="user-actions__item">
                                <i class="fa fa-thumbs-up" aria-hidden="true"></i>
                                <a href="<?=$webinar->getLinkLikes()?>"><?=$webinar->getCountLikes()?></a>
                            </div>
                            <div class="user-actions__item">
                                <i class="fa fa-comments" aria-hidden="true"></i>
                                <a href="<?=$webinar->getLinkComments()?>"><?=$webinar->getCountComments()?></a>
                            </div>
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

