<?php

use yii\helpers\Url;
use common\models\Nevs;

$AllNevs = Nevs::find()
    ->where(['status' => '1'])
    ->orderBy(['id' => SORT_DESC])
    ->limit(5)
    ->all();
?>

<!-- Classes Start -->
<div class="class-wrap">

	
  <div class="container">
    <div class="title">
      <h1>So'ngi yangiliklar</h1>
    </div>

    <ul class="owl-carousel">
    	<?php foreach ($AllNevs as $key => $nevs) :?>
      <li class="item">
        <div class="class_box">
          <div class="class_Img"><img src="/news/<?=$nevs['image']?>" alt="">
            <div class="time_box"><span><?=$nevs['date']?></span></div>
          </div>
          <div class="path_box">
            <h3><a href=
              "<?php
                if($nevs->type_id == 1){
                  echo Url::to(['nevs/detail', 'id' => $nevs->id]);
                }else{
                    echo Url::to(['nevs/video', 'id' => $nevs->id]);
                }
                ?>
              "> 
              <?=$nevs['title']?></a></h3>
            <p> <?=$nevs['text']?></p>
            <div class="students_box">
              <div class="students"><i class="fas fa-eye" aria-hidden="true"></i></div>
              <div class="stud_fee"><span><?=$nevs['views_count']?></span></div>
            </div>
          </div>
        </div>
      </li>
    <?php endforeach; ?>
     

    </ul>
  </div>
</div>
<!-- Classes End --> 


