<?php


use yii\widgets\ActiveForm;
use yii\helpers\Html;
use kartik\switchinput\SwitchInput;
/** @var \common\models\Task $model []
 * @var \common\models\Task $group []
 */
?>


<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Guruh qo'shish</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <?php $form = ActiveForm::begin(); ?>
                    <div class="card-body">
                        <div class="form-group">
                            <?= $form->field($model, 'task_text')->textInput(['maxlength' => true, 'rows' => 3]) ?>
                        </div>
                        <div class="form-group">
                            <?= $form->field($model, 'task_number')->textInput(['maxlength' => true]) ?>
                        </div>
                        <div class="form-group">
                            <?= $form->field($model, 'attemps')->textInput(['maxlength' => true]) ?>
                        </div>
                    </div>
                    <div class="card-footer">
                        <?= Html::submitButton('Saqlash', ['class' => 'btn btn-primary']) ?>
                    </div>
                    <?php ActiveForm::end(); ?>
                </div>

            </div>

            <!-- /.col -->
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Guruhlar</h3>
                    </div>
                    <div class="card-body p-0">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Topshiriq raqami</th>
                                <th></th>
                                <th>Topshiriq mavzusi</th>
                                <th></th>
                                <th>Urinishlar soni</th>
                                <th></th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($group as $key) : ?>
                                <tr>
                                    <td><?= $key->task_number ?></td>
                                    <td></td>
                                    <td><?= $key->task_text ?></td>
                                    <td></td>
                                    <td><?= $key->attemps ?></td>
                                    <td></td>
                                    <td>
                                        <?= Html::a('<i class="fa fa-trash" aria-hidden="true"></i>', ['delete', 'id' => $key->id], [
                                            'class' => 'btn btn-danger',
                                            'data' => [
                                                'confirm' => '!!! DIQQAT topshiriqni haqqatdanham o\'chirasizmi!',
                                                'method' => 'post',
                                            ],
                                        ]) ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
</section>

