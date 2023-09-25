<?php

/* @var $this \yii\web\View */

/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="hold-transition sidebar-mini text-sm">
<?php $this->beginBody() ?>
<div class="wrapper">
    <?= $this->render('_navbar') ?>
    <?= $this->render('_main_sidebar_container') ?>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                    </div>
                    <div class="col-sm-6">
                        <?= Breadcrumbs::widget([
                            'options' => ['class' => 'breadcrumb float-sm-right'],
                            'homeLink' => [
                                'label' => '<i class=\'fa fa-home\'></i> Bosh sahifa',
                                'url' => ['/'],
                                'encode' => false,
                            ],
                            'itemTemplate' => "<li> {link} / &nbsp</li>\n",
                            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                        ]) ?>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <?= $content ?>
            </div>
        </section>


    </div>
    <?= $this->render('_footer') ?>
</div>
<?php $this->endBody() ?>

<?php

$js = <<<JS
 bsCustomFileInput.init();
JS;
$js1 = <<<JS
$.widget.bridge('uibutton', $.ui.button)
JS;

$this->registerJs($js);
$this->registerJs($js1);


?>
</body>
</html>
<?php $this->endPage() ?>
