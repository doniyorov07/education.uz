<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use common\models\User;
use common\models\Group;


/**
 * @var $model[]
 */
$this->title = "Studentni guruhga biriktirish";

\dominus77\sweetalert2\Alert::widget(['useSessionFlash' => true]);
?>
<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
<div class="card-body">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <?= $form->field($model, 'student_id')->widget(Select2::classname(), [
                    'data' => ArrayHelper::map(User::find()->where(['status' =>10])->all(),'id',  function ($data){
                        return $data->last_name . ' ' . $data->first_name;
                    }),
                    'language' => 'de',
                    'options' => ['placeholder' => 'Studentni tanlang ...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]);
                ?>

            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <?= $form->field($model, 'group_id')->widget(Select2::classname(), [
                    'data' => ArrayHelper::map(Group::find()->where(['status' => 1])->all(),'id','group_name'),
                    'language' => 'de',
                    'options' => ['placeholder' => 'Guruhni tanlang ...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]);
                ?>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div style="margin-top: 31px" class="form-group">
                <?= Html::submitButton('Biriktirish', ['class' => 'btn btn-primary']) ?>
            </div>
        </div>

    </div>


</div>

<?php ActiveForm::end(); ?>