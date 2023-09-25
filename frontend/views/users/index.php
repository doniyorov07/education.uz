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
        <h3>Yangi Akkaunt ochish</h3>
        <p>Profil</p>
        <div class="form-group">
        	<a href="<?= Url::to('signup')?>"> 
          <button type="submit" class="default-btn btn send_btn"><span>Ro'yxatdan o'tish</span></button>
        </div></a>

        <div class="contact-form loginWrp">
          <h3>Tizimga kirish</h3>
          <p>Login va Parolni kiriting</p>

          <form id="contactForm" novalidate="">
            <div class="row">
              <div class="col-lg-12 col-md-12">
                <div class="form-group">
            <a href="<?= Url::to('login')?>"> 
        <button type="submit" class="default-btn btn send_btn"><span>Tizimga Kirish</span></button>
        </div></a>
                </div>
                <div class="form-group">
                  <div class="forgot_password"><a href="#">Reset My Password</a></div>
                </div>
              </div>
            </div>
          </form>
        </div>

      </div>
    </div>
    <!-- Login End --> 
    
  </div>
</div>
<!-- Inner Content Start --> 


