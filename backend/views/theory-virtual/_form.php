<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\switchinput\SwitchInput;
/* @var $this yii\web\View */
/* @var $model common\models\TheoryVirtual */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="theory-virtual-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'lesson_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'video_link')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->widget(SwitchInput::classname(), [
        'pluginOptions' => [
            'size' => 'large',
            'onColor' => 'success',
            'offColor' => 'danger',
            'onText' => "On",
            'offText' => "Off",
        ]
    ])?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Saqlash'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
