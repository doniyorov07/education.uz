<?php

use yii\helpers\Url;
/**
 * @var \common\models\Task $model[]
 */
?>



<div class="innerHeading-wrap">
    <div class="container">
        <h1>Topshiriqlar</h1>
    </div>
</div>

<div class="innerContent-wrap">
    <div class="container">
        <div class="testimonials-wrap">
            <ul class="row  unorderList">
                <?php foreach ($model as $item): ?>
                <li class="col-lg-6 ">
                    <div class="testimonials_sec">
                        <p><?=$item->task_text?></p>


                        <h3><?=$item->task_number?></h3>
                        <br>
                        <h3>
                            <a class="text-decoration-none" href="<?=Url::to(['/task-table/send/', 'id' => $item->id])?>">
                            Topshirish
                            </a>
                        </h3>


                    </div>
                </li>
                <?php endforeach;?>
            </ul>
        </div>
    </div>
</div>


