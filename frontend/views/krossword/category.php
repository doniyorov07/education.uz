<?php
use yii\helpers\Url;


?>

    <div class="single-widgets widget_category ">
            <h4>Menu</h4>
            <ul class="categories">
              <li><a href="<?=Url::to(['site/index'])?>">Bosh Sahifa</a></li>
              <li><a href="<?=Url::to(['theory/index'])?>">Nazariya</a></li>
              <li><a href="<?=Url::to(['practica/index'])?>">Amaliy Tajriba</a></li>
              <li><a href="<?=Url::to(['laboratory/index'])?>">Labaratoriya</a></li>
              <li><a href="<?=Url::to(['test/index'])?>">Test Nazorati</a></li>
              <li><a href="<?=Url::to(['form/index'])?>">Aloqa</a></li>
            </ul>
          </div>