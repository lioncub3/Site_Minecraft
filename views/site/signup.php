<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

$this->registerCssFile('/css/signup.css');
?>

<header>
    <?= $this->render('../site/_header', ['modelLoginForm' => $modelLoginForm]); ?>
</header>
<main class="container">
    <section class="row">
        <div class="col-sm-4">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

            <?= $form->field($model, 'username')->textInput(['autofocus' => true, 'class' => 'text']) ?>

            <?= $form->field($model, 'email')->textInput(['class' => 'text']) ?>

            <?= $form->field($model, 'password')->passwordInput(['class' => 'text']) ?>

            <?= $form->field($model, 'rules')->checkbox(['class' => 'checkbox', 'template' => '
                    <div class="wthree-text">
						<label class="anim">
							{input}
							<span>Я соглашаюсь с <a href="/site/rules">правилами</a>.</span>
						</label>
						<div class="clear"> </div>
					</div>']) ?>

            <div class="form-group">
                <?= Html::submitButton('Зарегистрироваться', ['class' => 'btn-signup', 'name' => 'signup-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </section>
</main>