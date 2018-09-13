<?php if (!empty($words)): ?>
    <?php foreach ($words as $key => $value): ?>
        <?php if ($key % 2 == 0): ?>
            <div class="missiion__head  mission__wrap-item">
                <div class="row  align-items-center">
                    <div class="col-lg-6">
                        <div class="content-text">
                            <h2><?=$value->title ?></h2>
                            <p><?=$value->text ?></p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="img-wrap  text-center">
                            <?php if (!empty($value->photo)): ?>
                                <img src="/<?=$value->photo ?>" alt="">
                            <?php endif ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php else: ?>
            <div class="missiion__head  mission__wrap-item">
                <div class="row  align-items-center">
                    <div class="col-lg-6">
                        <div class="img-wrap  text-center">
                            <?php if (!empty($value->photo)): ?>
                                <img src="/<?=$value->photo ?>" alt="">
                            <?php endif ?>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="content-text">
                            <h2><?=$value->title ?></h2>
                            <p><?=$value->text ?></p>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif ?>
    <?php endforeach ?>
<?php endif ?>