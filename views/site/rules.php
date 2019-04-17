<?php
/** @var  app\models\LoginForm $modelLoginForm */
/** @var  app\models\Rules $modelRules */

$this->registerCssFile('/css/rules.css');
?>
<header>
    <?= $this->render('_header', ['modelLoginForm' => $modelLoginForm]); ?>
</header>

<main>
    <div class="container">
        <br>
        <br>
        <br>
        <h3 class="title title-rules"><span>Правила сервера</span></h3>
        <div class="rules-content row">
            <?= $modelRules->content ?>
        </div>
        <br>
        <br>
        <br>
    </div>
</main>