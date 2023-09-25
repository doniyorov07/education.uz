<?php

use yii\helpers\Url;
use common\models\Practica;

$prac = Practica::find()
    ->where(['status' => '1'])
    ->orderBy(['id' => SORT_DESC])
    ->limit(3)
    ->all();
?>


<!-- Blog Start -->
<div class="blog-wrap flight-wrap ">
  <div class="container">
    <div class="title">
      <h1> Amaliy Tajriba </h1>
    </div>
    <ul class="row unorderList">

      <?php foreach ($prac as $key => $practica) :?>
        <li class="col-lg-4 col-md-6">
          <div class="blog_box">
            <div class="blogImg"><img src="/practica/image/<?=$practica['image']?>" alt="">
              <div class="time_box"><span><?=$practica['date']?></span></div>
            </div>
            <div class="path_box">
              <h3><a href="
                <?php 
                if($practica->type_id == 1){
                  echo Url::to(['practica/detail', 'id' => $practica->id]);
                }else{
                    echo Url::to(['practica/video', 'id' => $practica->id]);
                }
                ?>
                ">

                <?=$practica['title']?></a></h3>
             
            </div>
          </div>
        </li>
    <?php endforeach;?>

    </ul>
  </div>
</div>
<!-- Blog End --> 
