<?php

use kartik\file\FileInput;
use yii\helpers\Html;
/**
 * @var \frontend\controllers\TaskTableController $model
 * @var \frontend\controllers\TaskTableController $attempts
 * @var \frontend\controllers\TaskTableController $file
 */

?>

<div class="innerHeading-wrap">
    <div class="container">
        <h1>Topshiriq yuklash</h1>
    </div>
</div>


<div class="innerContent-wrap">
    <div class="container">

        <!-- Classes Details Start -->
        <div class="classDetails-wrap">
            <div class="row">
                <div class="col-lg-8"> <?php
                    if ($attempts >= $model->attemps)
                    {
                        echo '  <div style="background-color: #f0aa00; padding: 20px" class="" role="al">
                                    <h4  class="text-center">Ogohlantirish!</h4>
                                    <h5 class="text-center">Urinishlar soni tugadi</h5>                                   
                                  </div>';
                    }else
                    {
                        echo '<div class="class_left">';
                        $form = \yii\widgets\ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]);
                        echo $form->field($file, 'file')->FileInput()->label('Faylni tanlash uchun bosing');
                        echo '<div class="form-group">';
                        echo Html::submitButton(Yii::t('app', 'Saqlash'), ['class' => 'btn btn-success']);
                        echo '</div>';
                        \yii\widgets\ActiveForm::end();
                        echo '</div>';
                    }
                    ?>

                </div>
                <div class="col-lg-4">
                    <div class="single-widgets widget_category ">
                        <h4>Ma'lumot</h4>
                        <ul class="unorderList">
                            <li><a href="#">Topshiriq raqami<span><?= $model->task_number?></span></a></li>
                            <li><a href="#">Urinishlar soni <span>
                                        <?php
                                        if ($attempts !== null)
                                        {
                                            echo  $attempts . '/' . $model->attemps;
                                        }else{
                                            echo 0 . '/' . $model->attemps;
                                        }
                                        ?>
                                    </span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- Classes Details End -->

    </div>
</div>
