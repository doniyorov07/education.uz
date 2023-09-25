<?php
use yii\helpers\Url;
use common\models\Slider;

$slider =  Slider::find()->where(['status' => 1])->all();


?>
<!-- Revolution slider start -->
<div class="tp-banner-container">
  <div class="tp-banner">
    <ul>
      <?php foreach ($slider as $key): ?>
      <li data-slotamount="7" data-transition="3dcurtain-horizontal" data-masterspeed="1000" data-saveperformance="on"> <img alt="" src="/slider/foto1/<?=$key['foto1']?>" data-lazyload="/slider/foto1/<?=$key['foto1']?>">
        <div class="caption lft large-title tp-resizeme slidertext2" data-x="center" data-y="170" data-speed="600" data-start="1600"><span> <?=$key['title1']?> </span></div>
        <div class="caption lfb large-title tp-resizeme slidertext3" data-x="center" data-y="260" data-speed="600" data-start="2200"> <?=$key['text1']?></div>
       
      </li>
      <li data-slotamount="7" data-transition="slotzoom-horizontal" data-masterspeed="1000" data-saveperformance="on"> <img alt="" src="/slider/foto2/<?=$key['foto2']?>" data-lazyload="/slider/foto2/<?=$key['foto2']?>">
        <div class="caption lft large-title tp-resizeme slidertext2" data-x="center" data-y="170" data-speed="600" data-start="1600"><span> <?=$key['title1']?> </span></div>
        <div class="caption lfb large-title tp-resizeme slidertext3" data-x="center" data-y="260" data-speed="600" data-start="2200"> <?=$key['text2']?></div>
        
      </li>
    <?php endforeach; ?>
    </ul>
  </div>
</div>





<!-- Revolution slider end --> 