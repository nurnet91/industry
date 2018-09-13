<div class="about__people-list  row">
    <div class="about__col  col-md-12">

        <div class="row  justify-content-between">
            <?php foreach ($model as $director): ?>
            <div class="about__member  company-member  col-sm-6">
                <div class="flex justify-content-center  text-center">
                    <div class="company-member__img  company-member__img_profile img-wrap">
                        <?= $AboutDirectorModal->indidualButton($director); ?>
                        <?= $AboutDirectorModal->deleteButton($director); ?>
                        <img src="<?=$director->photoD?>" alt="">
                    </div>
                    <div class="company-member__text  company-member__text_profile  col-sm">
                        <p><?=$director->fio?></p>
                        <p class="text  color-light-grey"><?=$director->position?></p>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>