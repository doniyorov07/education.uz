<?php

use yii\helpers\Html;
use yii\helpers\Url;

?>
<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="<?= Url::to(['/']) ?>" class="nav-link"><i class="fas fa-home"></i> Bosh sahifa</a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                <i class="fas fa-th-large"></i>
            </a>
        </li>
        <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                <i class="fas fa-user mr-2"></i>
                <span class="hidden-xs "> <?= Yii::$app->user->identity->username ?? '' ?> </span>
                <i class="fas fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu">
                <li class="user-header">
                    <img src="<?= Url::base() ?>/adminLte3/img/AdminLTELogo.png" class="img-circle"
                         alt="User Image"/>
                    <p>
                        <?= Yii::$app->user->identity->fullname ?? '' ?>
                    </p>
                </li>
                <!-- Menu Body -->
                <!-- Menu Footer-->
                <li class="user-footer">
                    <div class="float-left">
                       <!--  <a href="<?= Url::to(['/profilemanager']) ?>"
                           class="btn btn-default btn-flat">
                            <span class="fas fa-user-cog"></span>Shaxsiy kabinet
                        </a> -->
                        <?= Html::a(
                            '<i class="fa fa-sign-out-alt"></i>' . " " . "Chiqish",
                            ['/site/logout'],
                            ['data-method' => 'post', 'class' => 'btn btn-default btn-flat']
                        ) ?>
                    </div>

                </li>
            </ul>
        </li>
    </ul>
</nav>
<!-- /.navbar -->