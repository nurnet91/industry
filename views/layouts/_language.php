<div class="lang">
	<ul>
		<li>
			<a href="#">
				<img src="/images/flags/<?=$lan ?>.jpg" alt="">
				<span><?=$langs[$lan]['id'] ?></span>
				<i class="fa fa-caret-down"></i>
			</a>
			<ul class="lang__drop">
				<?php foreach ($langs as $key => $value): ?>
					<?php if ($key != $lan): ?>
						<li><a href="/language/<?=$key ?>"><img src="/images/flags/<?=$key ?>.jpg" alt=""><?=$value['id'] ?></a></li>
					<?php endif ?>
				<?php endforeach ?>
			</ul>
		</li>
	</ul>
</div>