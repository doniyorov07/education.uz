<?php
use yii\helpers\Url;

use yii\widgets\LinkPager;
use common\models\Test;

/**
 * @var Test $model
 * @var \yii\data\Pagination $pagination
 */
$this->title = 'Tarmoq Texnologiyasi';
?>



<!-- Inner Heading Start -->
<div class="innerHeading-wrap">
    <div class="container">
        <h1>Test</h1>
    </div>
</div>
<!-- Inner Heading End -->


<!-- Inner Content Start -->
<div class="innerContent-wrap">
    <div class="container">
        <div class="blog_inner ">
            <ul class="row unorderList">
                <?php foreach ($model as $value) :?>
                    <li class="col-lg-4 col-md-6">
                        <div class="blog_box">
                            <div class="blogImg"><img src="/krossword/<?=$value['image']?>" alt="">
                            </div>
                            <div class="path_box text-center">
                                <h3>
                                    <a href="<?= Url::to(['test/detail', 'id' => $value->id])?>">
                                     <?=$value['lesson_name']?>
                                    </a> 
                                </h3>
                            </div>
                        </div>
                    </li>
                <?php endforeach;?>

            </ul>
            <div class="blog-pagination text-center">

                <?php
                echo LinkPager::widget(
                    [
                        'pagination' => $pagination,
                        'maxButtonCount' => 2,
                    ]
                );
                ?>

            </div>
        </div>
    </div>
</div>
<!-- Inner Content Start -->