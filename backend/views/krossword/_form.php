<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\switchinput\SwitchInput;
use kartik\file\FileInput;
/* @var $this yii\web\View */
/* @var $model common\models\Krossword */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="krossword-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'image')->widget(FileInput::classname(),[
        'name' => 'attachment_53',
        'pluginOptions' => [
            'showCaption' => false,
            'showRemove' => false,
            'showUpload' => false,
            'browseClass' => 'btn btn-primary btn-block',
            'browseIcon' => '<i class="fas fa-camera"></i> ',
            'browseLabel' =>  'Rasmni yuklang'
        ],
        'options' => ['accept' => 'image/*']
    ]); ?>

    <?= $form->field($model, 'lesson_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'link')->textInput(['maxlength' => true]) ?>

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
