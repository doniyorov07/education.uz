<?php
use yii\helpers\Url;

use common\models\SchoolStart;

$school = SchoolStart::find()
  ->where(['status' => '1'])
    ->all();


?>

<!-- School Start -->
<div class="our-course-categories-two ">
  <div class="container">
    <div class="categories_wrap">
      <ul class="row unorderList">
        <?php foreach ($school as $key => $start) : ?>
     

        <li class="col-lg-3 col-md-6"> 
          <!-- single-course-categories -->
          <div class="categories-course">
            <div class="item-inner">
              <div class="cours-icon"> <span class="coure-icon-inner"> <img src="/school/<?= $start['image']; ?>" alt=""> </span> </div>
              <div class="cours-title">
                <h4><?= $start['title'] ?></h4>
                <p><?=$start['text']?></p>
              </div>
            </div>
          </div>
          <!--// single-course-categories --> 
        </li>

       <?php endforeach; ?>
      </ul>
    </div>
  </div>
</div>

<!-- School End --> 