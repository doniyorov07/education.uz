<?php

use backend\modules\testmanager\widgets\CKEditorForDynamicForm;
use mihaildev\elfinder\ElFinder;
use wbraganca\dynamicform\DynamicFormWidget;
use yii\helpers\Html;
use kartik\form\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\testmanager\models\Question */
/* @var $modelsOption \backend\modules\testmanager\models\Option[] */

\yii\jui\JuiAsset::register($this);

$host = Yii::$app->request->hostInfo;
$wirisJsUrl = $host . '/ckeditor/plugins/ckeditor_wiris/plugin.js';
$this->registerJs("CKEDITOR.plugins.addExternal('ckeditor_wiris', '" . $wirisJsUrl . "', '');");

$ckeditorOptions = ElFinder::ckeditorOptions('elfinder', [
    'height' => '80px',
    'allowedContent' => true,
    'extraPlugins' => 'ckeditor_wiris',
    'toolbarGroups' => [
        ['name' => 'undo'],
        ['name' => 'basicstyles', 'groups' => ['basicstyles', 'cleanup']],
        ['name' => 'colors'],
        ['name' => 'links', 'groups' => ['insert']],
        ['name' => 'others', 'groups' => ['others']],
        ['name' => 'ckeditor_wiris'] // <--- OUR NEW PLUGIN YAY!
    ]
]);

?>

<?php $form = ActiveForm::begin([
    'id' => 'dynamic-form',
]); ?>

<?= $form->field($model, 'title')
    ->widget(CKEditorForDynamicForm::className(), ['editorOptions' => $ckeditorOptions, 'options' => ['autofocus' => true, 'tabindex' => 1]])
    ->label('Test savoli')
?>

<?= $form->field($model, 'status')->checkbox([], false)->label('Faol') ?>

<hr>
<h5 align="center" class="text-muted">Variantlar</h5>
<hr>

<?php DynamicFormWidget::begin([
    'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
    'widgetBody' => '.container-items', // required: css class selector
    'widgetItem' => '.item', // required: css class
    'limit' => 6, // the maximum times, an element can be cloned (default 999)
    'min' => 1, // 0 or 1 (default 1)
    'insertButton' => '.add-item', // css class
    'deleteButton' => '.remove-item', // css class
    'model' => $modelsOption[0],
    'formId' => 'dynamic-form',
    'formFields' => [
        'text',
        'isAnswer',
    ],
]); ?>
<div class="row container-items">

    <?php foreach ($modelsOption as $index => $modelOption): ?>
        <div class="col-md-6 item">
            <div class=""><!-- widgetBody -->
                <div class="">
                    <h5 class="text-info" align="center">
                        <button title="Ushbu variantni o'chirish" style="margin: 0 5px;" type="button"
                                class="float-right remove-item btn btn-danger btn-xs"><i class="fa fa-trash"></i>
                        </button>
                        <button title="Yangi variant qo'shish" style="margin: 0 5px;" type="button"
                                class="float-right add-item btn btn-success btn-xs"><i class="fa fa-plus"></i>
                            Variant
                            qo'shish
                        </button>
                    </h5><!--/.text-info -->
                    <div class="clearfix"></div>
                </div>
                <?php
                // necessary for update action.
                if (!$modelOption->isNewRecord) {
                    echo Html::activeHiddenInput($modelOption, "[{$index}]id", ['class' => 'id-hidden-input']);
                }
                ?>
                <div class="radio-area">
                    <?= Html::radio('is_answer', $modelOption->is_answer, ['label' => "To'g'ri javob", 'value' => $index, 'class' => "radio-selection", 'title' => "Ushbu variantni to'g'ri javob sifatida belgilash"]) ?>
                </div>
                <?php $tabindex = $index + 2 ?>
                <?= $form->field($modelOption, "[{$index}]text")->widget(CKEditorForDynamicForm::className(), ['editorOptions' => $ckeditorOptions, 'options' => ['tabindex' => $tabindex]])->label(false) ?>
            </div>
        </div><!--/.col-md-6 -->
    <?php endforeach; ?>
</div>
<?php DynamicFormWidget::end(); ?>

<div class="form-group">
    <?= Html::submitButton('Saqlash', ['class' => 'btn btn-success']) ?>
</div>

<?php ActiveForm::end(); ?>


<?php

$js = <<<JS
    
     $('.dynamicform_wrapper').on('afterInsert', function(e, item) {
       reArrangeValues()
    });
    
    $('.dynamicform_wrapper').on('afterDelete', function(e) {
        reArrangeValues()
    });
    
    $('.dynamicform_wrapper').on('beforeDelete', function(e, item) {
        
        if (! confirm('Siz rostdan ham ushbu variantni o`chirmoqchimisiz?')) {
            return false;
        }
        return true;
    });
    
    $('.dynamicform_wrapper').on('limitReached', function(e, item) {
        alert('Bundan ortiq variant qo`shib bo`lmaydi!');
    });
    
    function reArrangeValues(){
         $('.dynamicform_wrapper .radio-selection').each(function(index){
            $(this).val(index)
        })
        $('.dynamicform_wrapper textarea').each(function(index){
            let tabindexvalue = index + 1
            $(this).attr('tabindex', tabindexvalue)
        })
    }
JS;

$this->registerJs($js);

?>