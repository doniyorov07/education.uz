<?php

use yii\helpers\Html;
// use kartik\form\ActiveForm;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model backend\modules\testmanager\models\Subject */
/* @var $form yii\widgets\ActiveForm */

?>
<?php $form = ActiveForm::begin(); ?>

<div class="row">
    <div class="col-md-6">
        <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>
        <?= $form->field($model, 'price')->input('number') ?>
        <?= $form->field($model, 'is_free')->checkbox() ?>
        <?= $form->field($model, 'status')->checkbox(['label' => 'Faol']) ?>
        <?= $form->field($model, 'show_answer')->checkbox(['label' => 'Javoblarni ko\'rsatish']) ?>
    </div>
    <div class="col-md-6">
        <?= $form->field($model, 'duration')->input('number') ?>
        <?= $form->field($model, 'tests_count')->input('number') ?>
    </div>
    <div class="col-12">
        <div class="form-group">
            <?= Html::submitButton('Saqlash', ['class' => 'btn btn-success']) ?>
        </div>
    </div>

</div>
<?php ActiveForm::end(); ?>
