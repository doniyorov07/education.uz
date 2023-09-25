<?php

use yii\helpers\Url;
use common\models\User;
use frontend\models\Form;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>


<!-- Inner Heading Start -->
<div class="innerHeading-wrap">
  <div class="container">
    <h1>Login</h1>
  </div>
</div>
<!-- Inner Heading End --> 

<!-- Inner Content Start -->
<div class="innerContent-wrap">
  <div class="container"> 
    
    <!-- Logn Start -->
    <div class="login-wrap ">
      <div class="contact-info login_box">
        <div class="contact-form loginWrp">
          <h3>Signup</h3>
          <p></p>

           <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>
            <div class="row">
              <div class="col-lg-12 col-md-12">
                <div class="form-group">
                 <?php  echo $form->field($model, 'username')->textInput()->label('Login'); ?>
                </div>
              </div>
              <div class="col-lg-12 col-md-12">
                <div class="form-group">
                   <?php  echo $form->field($model, 'password')->passwordInput()->label('Parol'); ?>
                </div>
              </div>
              
              <div class="col-lg-12 col-md-12">
                <div class="form-group">
                  <button type="submit" class="default-btn btn send_btn">Tizimga kirish<span></span></button>
                </div>
                <div class="form-group">
                  <div class="forgot_password"><a href="#">Parolni unutdim</a></div>
                </div>
              </div>
            </div>
            
         <?php ActiveForm::end() ?>
        </div>

      </div>
    </div>
    <!-- Login End --> 
    
  </div>
</div>
<!-- Inner Content Start --> 


