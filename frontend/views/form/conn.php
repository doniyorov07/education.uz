<?php
use Yii\helpers\Url;
use common\models\Contact;

$contac = Contact::find()
      ->where(['status' => 1])
      ->all();

$this->title = 'Tarmoq Texnologiyasi';
?>

 <div class="cont_info ">
      <div class="row">
      	<?php foreach ($contac as $key => $con) : ?>
        <div class="col-lg-4 col-md-6 md-mb-30">
          <div class="address-item style">
            <div class="address-icon"> <i class="fas fa-phone-alt"></i> </div>
            <div class="address-text">
              <h3 class="contact-title">Tel Raqam</h3>
              <ul class="unorderList">
                <li><a href="tel:<?=$con['number'];?>"><?=$con['number'];?></a></li>
              </ul>
            </div>
          </div>
        </div>
    <?php endforeach;?>
    	<?php foreach ($contac as $key => $con) : ?>
        <div class="col-lg-4 col-md-6 md-mb-30">
          <div class="address-item style">
            <div class="address-icon"> <i class="far fa-envelope"></i> </div>
            <div class="address-text">
              <h3 class="contact-title">Email</h3>
              <ul class="unorderList">
                <li><a href="#"><?=$con['email']?></a></li>
             
              </ul>
            </div>
          </div>
        </div>
         <?php endforeach;?>
        <?php foreach ($contac as $key => $con) : ?>
        <div class="col-lg-4 col-md-6">
          <div class="address-item">
            <div class="address-icon"> <i class="fas fa-map-marker-alt"></i> </div>
            <div class="address-text">
              <h3 class="contact-title">Manzil</h3>
              <p> <?=$con['adress']?></p>
            </div>
          </div>
        </div>
         <?php endforeach;?>
      </div>
    </div>
