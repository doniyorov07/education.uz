<?php


use yii\widgets\ActiveForm;
use yii\helpers\Html;
use kartik\switchinput\SwitchInput;
/** @var \common\models\Group $model []
 * @var \common\models\Group $group []
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
                            <?= $form->field($model, 'group_name')->textInput(['maxlength' => true]) ?>
                        </div>
                        <div class="form-group">
                        <?= $form->field($model, 'status')->widget(SwitchInput::classname(), [
                            'pluginOptions' => [
                                'size' => 'large',
                                'onColor' => 'success',
                                'offColor' => 'danger',
                                'onText' => "On",
                                'offText' => "Off",
                            ]
                        ])?>
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
                                <th>Guruh</th>
                                <th></th>
                                <th>Status</th>
                                <th></th>
                                <th>Ko'rish</th>
                                <th></th>
                                <th>O'chirish</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($group as $key) : ?>
                                <tr>
                                    <td><?= $key->group_name ?></td>
                                    <td></td>
                                    <td>
                                        <?php
                                        if ($key->status == 1) {
                                            echo Html::a('<i class="badge badge-success">Faol</i>', ['change', 'id' => $key  ->id]);
                                        } else {
                                            echo Html::a('<i class="badge badge-danger">Faol emas</i>', ['change', 'id' => $key  ->id]);
                                        }
                                        ?>
                                    </td>
                                    <td></td>
                                    <td>
                                        <?= Html::a('<i class="fas fa-eye" aria-hidden="true"></i>', ['student-group', 'id' => $key->id], [
                                            'class' => 'btn btn-primary',
                                        ]) ?>
                                    </td>
                                    <td></td>
                                    <td>
                                        <?= Html::a('<i class="fa fa-trash" aria-hidden="true"></i>', ['delete', 'id' => $key->id], [
                                            'class' => 'btn btn-danger',
                                            'data' => [
                                                'confirm' => '!!! DIQQAT  guruhni o\'chirishdan oldin guruh rahbarini o\'chiring!',
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

