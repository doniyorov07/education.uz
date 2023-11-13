<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use kartik\date\DatePicker;
use kartik\file\FileInput;
use kartik\switchinput\SwitchInput;

use mihaildev\ckeditor\CKEditor;

use kartik\select2\Select2;


/* @var $this yii\web\View */
/* @var $model common\models\Nevs */
/* @var $form yii\widgets\ActiveForm */

if($model->isNewRecord){
    $date = date("yyyy-mm-dd");
}else{
    $date = $model->date; }

?>

<div class="nevs-form">

  

<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
    


  <?=  $form->field($model, 'type_id')->widget(Select2::classname(), [
  
    'hideSearch' => true,
    'data' => [1 => 'Text', 2 => 'Video'],
    'options' => ['placeholder' => 'Ma\'lumot tipini tanlang'],
    'pluginOptions' => [
        'allowClear' => true
    ]
        ]); 
    ?>
    
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

    <?= $form->field($model, 'video_url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'text')->textInput(['maxlength' => true]) ?>

   <?= $form->field($model, 'batafsil')->widget(CKEditor::className(),[
    'editorOptions' => [
        'preset' => 'full', 
        'inline' => false, 
    ],
    ]);
    ?>

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

 

    <?= $form->field($model, 'status')->widget(SwitchInput::classname(), [
        'pluginOptions' => [
                'size' => 'large',
                'onColor' => 'success',
                'offColor' => 'danger',
                'onText' => "Faol",
                'offText' => "Faolmas",
            ]
    ])?>

    <?= $form->field($model, 'views_count')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Saqlash'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
