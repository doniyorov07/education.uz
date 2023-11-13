<?php

use yii\helpers\Url;
use common\widgets\Alert;
/** @var Alert $this */


$this->title = 'Login va Parolni o\'zgartirish';

?>
<?= Alert::widget() ?>
<div style="padding-top: 140px" class="d-flex justify-content-center">
<div class="profilemanager-default-index">
    <p>
        <a href="<?= Url::to(['change-login']) ?>" class="btn btn-primary">
            <i class="fa fa-edit"></i> <?= Yii::t('app', 'Loginni o\'zgartirish') ?>
        </a>
        <a href="<?= Url::to(['change-password']) ?>" class="btn btn-danger">
            <i class="fa fa-key"></i> <?= Yii::t('app', 'Parolni o\'zgartirish') ?>
        </a>
    </p>
</div>
</div>