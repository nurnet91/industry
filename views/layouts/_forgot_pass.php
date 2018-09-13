<?php

use app\models\LoginForm;
use app\models\Users;
use yii\widgets\ActiveForm;
    $model = new Users();

?>

<div class="popup_windows_wrap  header-popup" id="forgot_pass-popup">

    <div class="popup_win login popup_bg  header-popup__form-log-in" id="login">

        <div class="small_window">
            <div class="inner">
                <div class="header-popup__small-window-title  content-text">
                    <h2>Восстановление пароля</h2>
                </div>

                <?php

                $form = ActiveForm::begin([
                    'action' => '/site/reset-pass',
                    'id' => 'reset_pass_form',
                    'options' => ['class' => 'site_form'],
                ]); ?>

                <?=$form->field($model, 'email', [
                    'template' => "
				    		<div class='input-wrap'>\n
				    		    {input}
								<i class='input-wrap__fa  fa fa-user' aria-hidden='true' data-toggle='tooltip'  data-placement='top' title='Введите e-mail адрес для получения нового пароля'></i>\n
							</div>\n
							<p class='help-block help-block-error'></p>
			    		",
                ])->textInput(['placeholder' => 'Введите E-mail', 'class' => 'popup_input']) ?>

                <div class="form_buttons  header-popup__log-in">
                    <button type="submit" class="button button_blue button_wide">Отправить</button>
                </div>

                <?php ActiveForm::end(); ?>
            </div>

        </div>
    </div>
</div>