<?php 

use app\models\Users;
use yii\helpers\Html;
	
?>
<?php if (!Yii::$app->user->isGuest): ?>

	<?php 

		$cnt_mess = Yii::$app->user->identity->messagecount;

	?>

	<div class="company-popup-box">

		<button class="company-popup-box__btn">

			<i class="fa fa-user" aria-hidden="true"></i> <?=Yii::$app->user->identity->role_id == Users::ROLE_COMPANY ? Yii::$app->user->identity->companyinfo->name : Yii::$app->user->identity->username ?>

			<?php if ($cnt_mess > 0): ?>

				<span class="badge badge-pill badge-danger"><?=$cnt_mess ?></span>

			<?php endif ?>

		</button>

		<div class="company-popup-box__popup  company-popup-box__popup_personal">

			<ul>
				<?php if (Yii::$app->user->identity->role_id == Users::ROLE_COMPANY): ?>

					<li>
						<a href="/company/analytic"><i class="fa fa-eye" aria-hidden="true"></i> Статистика</a>
					</li>

					<li>
						<a href="/company/index"><i class="fa fa-cog" aria-hidden="true"></i> Настройка профиля</a>
					</li>

					<li>
						<a href="#"><i class="fa fa-bookmark" aria-hidden="true"></i> Запросы</a>
					</li>

					<li>
						<a href="/company/advertising"><i class="fa fa-copyright" aria-hidden="true"></i> Реклама</a>
					</li>
					
					<li>
						<a href="#"><i class="fa fa-question" aria-hidden="true"></i>  Поддержка</a>
					</li>
					
				<?php else: ?>

					<li>
						<a href="/personal/interests"><i class="fa fa-eye" aria-hidden="true"></i> Просмотреть позже</a>
					</li>

					<li>
						<a href="personal/interests"><i class="fa fa-bookmark" aria-hidden="true"></i> Избранное</a>
					</li>

					<li>
						<a href="/personal"><i class="fa fa-cog" aria-hidden="true"></i> Настройки</a>
					</li>

					<li>
						<a href="/personal/publish"><i class="fa fa-copyright" aria-hidden="true"></i> Опубликовать</a>
					</li>
					
					<li>
						<a href="#"><i class="fa fa-question" aria-hidden="true"></i>  Поддержка</a>
					</li>

				<?php endif ?>

			</ul>

			<a href="/logout" class="company-popup-box__exit  button  button_red">Выйти</a>

		</div>

	</div>

<?php else: ?>

	<a class="morphing-btn  autorization-btn" data-morphing="" id="morphing" data-src="#header-popup" href="javascript:;">

		<i class="fa fa-user"></i>

		<span>Войти</span>

	</a>

<?php endif ?>
