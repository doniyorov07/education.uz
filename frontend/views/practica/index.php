<?php
use yii\helpers\Url;

use yii\widgets\LinkPager;
use common\models\Practica;

$prac = Practica::find()
      ->where(['status' => 1])
      ->all();

$this->title = 'Tarmoq Texnologiyasi';
?>



<!-- Inner Heading Start -->
<div class="innerHeading-wrap">
  <div class="container">
    <h1>Amaliy Tajribalar</h1>
  </div>
</div>
<!-- Inner Heading End --> 


<!-- Inner Content Start -->
<div class="innerContent-wrap">
  <div class="container">
    <div class="blog_inner ">
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
      <div class="blog-pagination text-center">

       <?= LinkPager::widget(['pagination' => $pages]);?>

       </div>
    </div>
  </div>
</div>
<!-- Inner Content Start --> 