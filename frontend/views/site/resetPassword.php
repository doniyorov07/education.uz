<?php/** @var yii\web\View $this *//** @var yii\bootstrap4\ActiveForm $form *//** @var \common\models\LoginForm $model */use yii\bootstrap4\Html;use common\widgets\Alert;use yii\bootstrap4\ActiveForm;use yii\helpers\Url;$this->title = 'NETWORKTECHNOLOGY.UZ';?><!-- Inner Heading Start --><div class="innerHeading-wrap">    <div class="container">        <h1>Yangi parol yarating</h1>    </div></div><div class="site-signup">    <div class="innerContent-wrap">        <div class="container">            <div class="login-wrap ">                <div class="contact-info login_box">                    <p style="text-align: center;"Iltimos, xavfsizlik uchun kuchliroq parol o'ylab toping</p>                    <div class="contact-form loginWrp">                        <?php $form = ActiveForm::begin(['id' => 'reset-password-form']); ?>                        <div class="row">                            <div class="col-lg-12 col-md-12">                                <div class="form-group">                                    <?= $form->field($model, 'password')->passwordInput(['autofocus' => true]) ?>                                </div>                            </div>                            <div class="col-lg-12 col-md-12">                                <div class="form-group">                                    <?= Html::submitButton('Tasdiqlash', ['class' => 'default-btn btn send_btn']) ?>                                </div>                            </div>                        </div>                        <?php ActiveForm::end(); ?>                    </div>                </div>            </div>        </div>    </div></div>