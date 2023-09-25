<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use kartik\date\DatePicker;
use kartik\file\FileInput;

use kartik\switchinput\SwitchInput;


use kartik\select2\Select2;
use kartik\popover\PopoverX;
//use yii\bootstrap5\Modal;
/* @var $this yii\web\View */
/* @var $model common\models\Laboratory */
/* @var $form yii\widgets\ActiveForm */
if($model->isNewRecord){
    $date = date("yyyy-mm-dd");
}else{
    $date = $model->date; 
}
?>

<div class="laboratory-form">

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

    <?= $form->field($model, 'date')->widget(DatePicker::classname(), [
            'name' => 'check_issue_date', 
    'value' => date('yyyy-mm-dd'),
    'options' => ['placeholder' => 'E\'lon qilish sanasi...'],
    'pluginOptions' => [
        'format' => 'yyyy-mm-dd',
        'todayHighlight' => true
    ]
        ]);
    ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'file')->widget(FileInput::classname(), [
    'name' => 'attachment_50',
    'pluginOptions' => [
        'showPreview' => false,
        'showCaption' => true,
        'showRemove' => true,
        'showUpload' => false
    ]
]);  ?>



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
