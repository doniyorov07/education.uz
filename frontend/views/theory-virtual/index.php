<?php

use yii\widgets\LinkPager;

/**
 * @var \frontend\controllers\TheoryVirtualController $model
 */
$this->title = 'Tarmoq Texnologiyasi';
?>



<!-- Inner Heading Start -->
<div class="innerHeading-wrap">
    <div class="container">
        <h1>Tarmoq haqida nazariy ma'lumotlar</h1>
    </div>
</div>
<!-- Inner Heading End -->
<div class="innerContent-wrap">
    <div class="container">
        <div class="blog_inner ">
            <ul class="row unorderList">
                <?php foreach ($model as $value) :?>
                    <li class="col-lg-4 col-md-6">
                        <div class="blog_box">
                            <div class="blogImg">
                                <iframe width="100%" height="300px" src="<?=$value->video_link?>" title="YouTube video player" frameborder="0" allow="accelerometer;
                         autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                            </div>
                            <div class="path_box text-center">
                                        <?=$value['lesson_name']?></a></h3>
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