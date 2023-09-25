<?php 
use yii\helpers\Url;
use yii\widgets\LinkPager;
use common\models\Laboratory;

$lab = Laboratory::find()
      ->where(['status' => 1])
      ->all();
$this->title = 'Tarmoq Texnologiyasi';
?>




<!-- Inner Heading Start -->
<div class="innerHeading-wrap">
  <div class="container">
    <h1>Laboratoriyalar</h1>
  </div>
</div>
<!-- Inner Heading End --> 


<!-- Inner Content Start -->
<div class="innerContent-wrap">
  <div class="container">
    <div class="blog_inner bloggridWrp">
      <div class="row">
        <div class="col-lg-8">
          <ul class="row unorderList">
          	<?php foreach ($lab as $key => $laboratory) :?>
            <li class="col-lg-6 col-md-6 ">
              <div class="blog_box">
                <div class="blogImg"><img src="/laboratory/image/<?=$laboratory['image']?>" alt="">
                  <div class="time_box"><span><?=$laboratory['date']?></span></div>
                </div>
                <div class="path_box">
                  <h3><a href="<?=Url::to(['laboratory/detail', 'id' => $laboratory->id])?>"><?=$laboratory['title']?></a></h3>
                  
                </div>
              </div>
            </li>
        <?php endforeach; ?>


          </ul>
          <div class="blog-pagination text-center"> 
          

          </div>
        </div>

        <div class="col-lg-4">

          <?=$this->render('search')?>
          <?=$this->render('category')?>
          <?=$this->render('latest_post')?>

         
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Inner Content Start --> 