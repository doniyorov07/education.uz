<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;

$this->title = 'Login';
?>
<div class="login-box">
    <div class="login-logo">
        <a href="/admin/"><i class="fas fa-user-cog"></i> <b>Admin</b></a>
    </div>
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg text-muted">Tizimga kirish</p>
            <?php $form = ActiveForm::begin(['id' => 'login-form']) ?>
            <?= $form->field($model, 'username', [
                'options' => ['class' => 'form-group has-feedback'],
                'inputTemplate' => '{input}<div class="input-group-append"><div class="input-group-text"><span class="fas fa-envelope"></span></div></div>',
                'template' => '{beginWrapper}{input}{error}{endWrapper}',
                'wrapperOptions' => ['class' => 'input-group mb-3']
            ])
                ->label(false)
                ->textInput(['placeholder' => $model->getAttributeLabel('username')]) ?>

            <?= $form->field($model, 'password', [
                'options' => ['class' => 'form-group has-feedback'],
                'inputTemplate' => '{input}<div class="input-group-append"><div class="input-group-text"><span class="fas fa-lock"></span></div></div>',
                'template' => '{beginWrapper}{input}{error}{endWrapper}',
                'wrapperOptions' => ['class' => 'input-group mb-3']
            ])
                ->label(false)
                ->passwordInput(['placeholder' => $model->getAttributeLabel('password')]) ?>

            <div class="row">
                <div class="col-8">
                    <?= $form->field($model, 'rememberMe')->checkbox([
//                        'template' => '<div class="icheck-primary">{input}{label}</div>',

                        'class' => 'form-check-input',

                        'labelOptions' => [
                            'class' => 'form-check-label'
                        ],
                        'uncheck' => false
                    ]) ?>
                </div>
                <div class="col-4">
                    <?= Html::submitButton('Kirish <i class="fas fa-sign-in-alt"></i>', ['class' => 'btn btn-primary btn-block']) ?>
                </div>
            </div>
            <?php \yii\bootstrap4\ActiveForm::end(); ?>
        </div>
        <!-- /.login-card-body -->
    </div>
</div>
</div>
<div class="col-sm-1"></div>
