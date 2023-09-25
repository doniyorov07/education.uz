<?php

/**
 * @var \common\models\Krossword $model
 */

$this->title = 'Tarmoq Texnologiyasi';
?>

<!-- Inner Heading Start -->
<div class="innerHeading-wrap">
    <div class="container">
        <h1>Krossword</h1>
    </div>
</div>
<!-- Inner Heading End -->

<!-- Inner Content Start -->
<div class="innerContent-wrap">
    <div class="container">
        <div class="blog_inner bloggridWrp blog_listWrp">
            <div class="row">
                <div class="col-lg-8">
                    <ul class="unorderList">
                        <iframe src="<?=$model->link?>" style="border:0px;width:100%;height:500px"
                                allowfullscreen="true" webkitallowfullscreen="true" mozallowfullscreen="true"></iframe>

                    </ul>
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