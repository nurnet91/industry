<?php if (!empty($comands)): ?>
    <div class="team-about__main-title   content-text  text-center"><h2>Наша команда</h2></div>
    <div class="row">
        <?php foreach ($comands as $key => $value): ?>
            <div class="team-about__col  col-md-6">
                <div class="team-about-member">
                    <div class="team-about-member__img  img-wrap">
                        <img src="/<?=$value->photo ?>" alt="">
                    </div>
                    <div class="team-about-member__body">
                        <div class="team-about-member__content  team-about-member__content_person  content  content-text">
                            <div><span><?=$value->fio ?></span></div>
                            <div><?=$value->occupation ?></div>
                        </div>
                        <div class="team-about-member__content  team-about-member__content_info  content-text">
                            <?php if (!empty($value->education)): ?>
                                <div><span>Образование:</span> <?=$value->education ?></div>
                            <?php endif ?>
                            <?php if (!empty($value->regalia)): ?>
                                <div><span>Регалии:</span> <?=$value->regalia ?></div>
                            <?php endif ?>
                            <?php if (!empty($value->experience)): ?>
                                <div><span>Опыт работы:</span> <?=$value->experience ?></div>
                            <?php endif ?>
                        </div>
                        <div class="team-about-member__content">
                            <p><?=$value->info ?></p>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>
<?php endif ?>