<?php 

use yii\helpers\Url;
use common\models\Nevs;

$AllNevs = Nevs::find()
    ->where(['status' => '1'])
    ->orderBy(['id' => SORT_DESC])
    ->limit(3)
    ->all();



?>

      <div class="single-widgets widget_category ">
            <h4>So'ngi Yangiliklar</h4>
            <ul class="property_sec ">
              <?php foreach ($AllNevs as $key => $nevs) :?>
              <li>
                <div class="rec_proprty">
                  <div class="propertyImg"><img src="/news/<?=$nevs['image']?>"></div>
                  <div class="property_info">
                    <h4><a href="<?= Url::to(['nevs/detail', 'id' => $nevs->id]) ?>"><?=$nevs['title']?></a></h4>
                    
                  </div>
                </div>
              </li>
             <?php endforeach;?>
            </ul>
          </div>
