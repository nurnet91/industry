<?php if (!empty($about)): ?>
    <div class="galery__title  content-text">
        <h2><a href="#">Об IH говорят</a></h2>
    </div>
    <div class="row">
        <div class="galery__col  col-md-6  col-lg-4">
            <?php foreach ($about as $key => $value): ?>
                <?php if ($key != 0 AND $key % 2 == 0): ?>
                    </div>
                    <div class="galery__col  col-md-6  col-lg-4">
                <?php endif ?>
                <div class="galery__item">
                    <?php 
                        $link = !empty($value->link) ? $value->link : '/'.$value->photo;
                        $attr1= !empty($value->link) ? '' : 'data-type="image"';
                        $icon = !empty($value->link) ? 'fa-play-circle' : 'fa-search-plus';
                    ?>
                    <a href="<?=$link ?>" class="galery__link" data-fancybox="images" <?=$attr1 ?>>
                        <span class="galery__link-loop">
                            <i class="fa <?=$icon ?>" aria-hidden="true"></i>
                        </span>
                        <img src="/<?=$value->photo ?>" alt="">
                    </a>
                    <?php if (!empty($value->text)): ?>
                         <div class="galery__item-body">
                            <div class="galery__item-content  content-text">
                                <p><?=$value->text ?></p>
                            </div>
                            <div class="galery__item-person  content-text  text-right">
                                <?php if (!empty($value->author)): ?>
                                    <h3><?=$value->author ?></h3>
                                <?php endif ?>
                                <?php if (!empty($value->dolz)): ?>
                                    <p><?=$value->dolz ?></p>
                                <?php endif ?>
                            </div>
                        </div>
                    <?php endif ?>
                </div>
            <?php endforeach ?>
        </div>
        <!-- <div class="galery__col  col-md-6  col-lg-4">
            <div class="galery__item">
                <a class="galery__link" data-fancybox="images" href="https://www.youtube.com/watch?v=_sI_Ps7JSEk&amp;autoplay=1&amp;rel=0&amp;controls=0&amp;showinfo=0">
								<span class="galery__link-loop">
									<i class="fa fa-play-circle" aria-hidden="true"></i>
								</span>
                    <img src="/images/temp/about1.jpg" alt="">
                </a>
            </div>

            <div class="galery__item">
                <a class="galery__link" data-fancybox="images" data-type="image"  href="/images/temp/about2.jpg">
								<span class="galery__link-loop">
									<i class="fa fa-search-plus" aria-hidden="true"></i>
								</span>
                    <img src="/images/temp/about2.jpg" alt="">
                </a>
                <div class="galery__item-body">
                    <div class="galery__item-content  content-text">
                        <p>Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору отточить навык публичных выступлений в домашних условиях. При создании генератора мы использовали</p>
                    </div>
                    <div class="galery__item-person  content-text  text-right">
                        <h3>Ивана Иванова,</h3>
                        <p>директор</p>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- <div class="galery__col  col-md-6  col-lg-4">
            <div class="galery__item">
                <a class="galery__link" data-fancybox="images" data-type="image" href="/images/temp/about3.jpg">
								<span class="galery__link-loop">
									<i class="fa fa-search-plus" aria-hidden="true"></i>
								</span>
                    <img src="/images/temp/about3.jpg" alt="">
                </a>
            </div>
            <div class="galery__item">
                <a class="galery__link" data-fancybox="images" data-type="image"  href="/images/temp/about2.jpg">
								<span class="galery__link-loop">
									<i class="fa fa-search-plus" aria-hidden="true"></i>
								</span>
                    <img src="/images/temp/about2.jpg" alt="">
                </a>
                <div class="galery__item-body">
                    <div class="galery__item-content  content-text">
                        <p>Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору отточить навык публичных выступлений в домашних условиях. При создании генератора мы использовали</p>
                    </div>
                    <div class="galery__item-person  content-text  text-right">
                        <h3>Ивана Иванова,</h3>
                        <p>директор</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="galery__col  col-md-6  col-lg-4">
            <div class="galery__item">
                <a class="galery__link" data-fancybox="images" data-type="image" href="/images/temp/about3.jpg">
								<span class="galery__link-loop">
									<i class="fa fa-search-plus" aria-hidden="true"></i>
								</span>
                    <img src="/images/temp/about3.jpg" alt="">
                </a>
            </div>
            <div class="galery__item">
                <a class="galery__link" data-fancybox="images" data-type="image"  href="/images/temp/about2.jpg">
								<span class="galery__link-loop">
									<i class="fa fa-search-plus" aria-hidden="true"></i>
								</span>
                    <img src="/images/temp/about2.jpg" alt="">
                </a>
                <div class="galery__item-body">
                    <div class="galery__item-content  content-text">
                        <p>Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору отточить навык публичных выступлений в домашних условиях. При создании генератора мы использовали</p>
                    </div>
                    <div class="galery__item-person  content-text  text-right">
                        <h3>Ивана Иванова,</h3>
                        <p>директор</p>
                    </div>
                </div>
            </div>
        </div> -->
    </div>
<?php endif ?>