<?php

use yii\helpers\Url;
use common\models\Nevs;

 $nevs = Nevs::find()
    ->where(['status' => '1'])
    ->andWhere(['id'=> $nevs->id])
    ->One();


    $this->title = 'Tarmoq Texnologiyasi';
?>


<!-- Inner Heading Start -->
<div class="innerHeading-wrap">
  <div class="container">
    <h1>Yangiliklar</h1>
  </div>
</div>
<!-- Inner Heading End --> 

<!-- Inner Content Start -->
<div class="innerContent-wrap">
  <div class="container">
    <div class="blog_inner bloggridWrp">
      <div class="row">
        <div class="col-lg-8 ">

          <div class="class_left">
            <div class="class_Img"><img src="/news/<?=$nevs['image']?>" alt="">
              <div class="time_box"><span><?=$nevs['date']?></span></div>
            </div>
            <h3><?= $nevs['title']?></h3>
            <p><?= $nevs['batafsil']?></p>
          </div>
           

        </div>
        <div class="col-lg-4">


          <?= $this->render('search');?>

          <?= $this->render('category');?>

          <?= $this->render('latest_post');?>


         
         
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Inner Content Start --> 
<div> </div>