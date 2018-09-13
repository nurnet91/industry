
<?php use yii\helpers\Url;?>
<?php if (!empty($events)):?>
        <div class="news-wrap-section__aside-title content-text">
            <h3><?=t('События')?></h3>
        </div>
            <?php foreach ($events as $event => $value): ?>
                <?php if ($event < 2): ?>
                    <a href="<?= $value->singleLink ?>"
                       class="news-wrap  news-wrap_event  news-wrap_event_russians">
                        <img src="<?= $value->getPhotos() ?>" alt="">
                        <div class="news-wrap__content  news-wrap__content_event  content-text">
                            <h4><?= $value->title ?></h4>
                            <div class="news-wrap__info">
                                <span><?= t('Место') ?>:</span>
                                <div><?= $value->eventsMap ?></div>
                            </div>
                            <div class="news-wrap__info">
                                <span><?= t('Дата') ?>:</span>
                                <div><?= $value->eventsDate ?></div>
                            </div>
                        </div>
                    </a>      <?php else: ?>
                    <div class="news-wrap__content  content-text">
                        <a href="<?= $value->singleLink ?>" class="hoverlink">
                            <h4><?= $value->title ?></h4></a>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        <div class="news-wrap-section__aside-foot  flex  justify-content-end">
            <a href="<?= Url::to('/main/news-events') ?>"
               class="news-wrap-section__aside-link-events"><?= t('Все события') ?></a>
        </div>
<?php endif; ?>

