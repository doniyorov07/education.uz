<?php

use kartik\form\ActiveForm;
use yii\helpers\Html;


/* @var $this \yii\web\View */
/* @var $model \backend\modules\profilemanager\models\ChangePasswordForm */

$this->title = Yii::t('app', 'Loginni o\'zgartirish');
$this->params['breadcrumbs'][] = ['url' => ['index'], 'label' => Yii::t('app', 'Ortga')];

?>

<div class="row justify-content-center">
    <div class="col-md-6">
        <?php $form = ActiveForm::begin() ?>
        <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
        <?= Html::submitButton(Yii::t('app', 'Saqlash'), ['class' => 'btn btn-primary']) ?>
        <?php ActiveForm::end() ?>
    </div>
</div>
