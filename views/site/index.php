<?php

/* @var $this yii\web\View */

use yii\helpers\Url;

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Добро пожаловать на сайт новостей!</h1>

        <?php if (Yii::$app->user->isGuest): ?>
        <p class="lead">Пожалуйста авторизуйтесь.</p>

            <p><a class="btn btn-lg btn-success" href="<?= Url::to(['site/login']) ?>">Авторизация</a></p>
        <?php endif; ?>
    </div>

</div>
