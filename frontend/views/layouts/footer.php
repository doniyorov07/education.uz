<?php
use yii\helpers\Url;
use common\models\Contact;

$contact = Contact::find()
      ->where(['status' => 1])
      ->all()



?>
<!-- Footer Start -->
<div class="footer-wrap">
  <div class="container">
    <div class="row">
      <div class="col-lg-4">
        <div class="footer_logo"><img alt="" class="footer-default" src="/logoza.png"></div>
        <p>Lorem ipsum dolor sit amet, adipiscing elit. Sed tempor, urna eu scelerisque maximus, urna nibh semper lectus, ut interdum nunc ligula et magna. In ac mauris vehicula, vulputate sem at, placerat nisl. Etiam laoreet erat magna, at hendrerit lorem vulputate non. Nam facilisis congue convallis.</p>
      </div>
      <div class="col-lg-2 col-md-3">
        <h3>Menyu</h3>
        <ul class="footer-links">
          <li> <a href="<?=Url::to('site/index')?>">Bosh Sahifa</a></li>
          <li> <a href="<?=Url::to('theory/index')?>">Nazariya</a></li>
          <li> <a href="<?=Url::to('practica/index')?>">Amaliy tajriba</a></li>
          <li> <a href="<?=Url::to('labortory/index')?>">Labaratoriya</a></li>
          <li> <a href="<?=Url::to('/')?>">Test Nazorati</a></li>
          <li> <a href="<?=Url::to('form/index')?>">Aloqa</a></li>
        </ul>
      </div>
      <div class="col-lg-3 col-md-4">
        <h3>Joylashuv</h3>
       
       <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3050.996073539269!2d65.37560691475201!3d40.12009098155198!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3f51c79f39df5855%3A0x688e2b64781d9e82!2sNavoiy%20Davlat%20pedagogika%20instituti!5e0!3m2!1sru!2s!4v1664251477217!5m2!1sru!2s" width="270" height="250" style="border:5px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

      </div>
      <div class="col-lg-3 col-md-4">
        <div class="footer_info"> 
          <h3>Aloqa</h3>

        <?php foreach($contact as $key => $con):?>
          <ul class="footer-adress">
            <li class="footer_address"> <i class="fas fa-map-signs"></i> <span><?= $con['adress']?> </span> </li>
            <li class="footer_email"> <i class="fas fa-envelope" aria-hidden="true"></i> <span><a href="mailto:<?= $con['email']?>"> <?= $con['email']?> </a></span> </li>
            <li class="footer_phone"> <i class="fas fa-phone"></i> <span><a href="tel:<?= $con['number']?>"> <?= $con['number']?></a></span> </li>
          </ul>
         <?php endforeach; ?>

<?php 
use common\models\Social;
$social = Social::find()
      ->where(['status' => 1])
      ->all();

?>

          <div class="social-icons footer_icon">
            <ul>
           <?php foreach ($social as $key => $soc) :?>   
            <li><a href="<?=$soc['url']?>"  target="_blank"><i class="<?=$soc['icon']?>" aria-hidden="true"></i></a></li>
        <?php endforeach;?>    
            </ul>
          </div>


        </div>
      </div>
    </div>
  </div>
</div>
<!-- Footer End --> 