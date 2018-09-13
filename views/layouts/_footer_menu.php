<div class="foot_menus col-sm-8  col-lg-9">
	<div class="row  justify-content-between">
		<div class="col-lg-4">
			<div class="footer__title  content-text">
				<h2>Направления</h2>
			</div>
			<h2 class="hidden">Направления</h2>
			<ul class="bot_menu">
                <?php foreach ($footer as $item): ?>
                    <?php if($item->footer_position == 0): ?>
                        <li><a href="<?=$item->id ?>"><?=$item->name ?></a></li>
                    <?php endif; ?>
                <?php endforeach; ?>
			</ul>
		</div>
		<div class="help_menu  col-lg-3">
			<h2 class="hidden">Разделы сайта</h2>
			<ul class="site_section">
                <?php foreach ($footer as $item): ?>
                    <?php if($item->footer_position == 1): ?>
                        <li><a href="<?= $item->id ?>"><?= $item->name ?></a></li>
                    <?php endif; ?>
                <?php endforeach; ?>
			</ul>
		</div>
		<div class="main_bot_menu  col-lg-5">
			<h2 class="hidden">Разделы сайта 2</h2>
			<ul class="site_section2">
                <?php foreach ($footer as $item): ?>
                    <?php if($item->footer_position == 2): ?>
                        <li><a href="<?= $item->id ?>"><?= $item->name ?></a></li>
                    <?php endif; ?>
                <?php endforeach; ?>
			</ul>

            <div class="footer__btns  buttons_box">
                <a href="/main/company-registration" class="footer__btn-large  button  button_green  button_footer">Зарегистрировать компанию</a>
                <a class="footer__btn-small  button  button_blue  button_footer" data-morphing="" id="morphing" data-src="#header-popup" href="javascript:;">Создать личный кабинет</a>
            </div>

		</div>
	</div>
</div>