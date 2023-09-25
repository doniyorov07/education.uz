<?php 

use common\models\Nevs;

$nevs = Nevs::find()
    ->where(['status' => '1'])
    ->andWhere(['id' => $nevs->id])
    ->One();

$this->title = 'Tarmoq Texnologiyasi';

?>



<!-- Video Start -->
<div class="video-wrap  ">
  <div class="container">
    <div class="title center_title">
      <h1>Video</h1>
    </div>
   
    <div class="video">
     
      <div class="playbtn"><a data-fancybox="" href="<?=$nevs['video_url']?>"><span></span></a></div>
     
    </div>
 
  </div>
</div>
<!-- Video End --> 