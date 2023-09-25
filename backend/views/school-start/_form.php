<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;
use kartik\switchinput\SwitchInput;
/* @var $this yii\web\View */
/* @var $model common\models\SchoolStart */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="school-start-form">

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

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'text')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->widget(SwitchInput::classname(), [
        'pluginOptions' => [
                'size' => 'large',
                'onColor' => 'success',
                'offColor' => 'danger',
                'onText' => "Faol",
                'offText' => "Faolmas",
            ]
    ])?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Saqlash'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
