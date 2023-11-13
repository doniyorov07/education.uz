<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var \frontend\controllers\ProfileController $model
 */
?>


<div class="innerHeading-wrap">
    <div class="container">
        <h1>Ma'lumotlarni o'zgartirish </h1>
    </div>
</div>

<div class="innerContent-wrap">
    <div class="container">

        <!-- Teachers Start -->
        <div class="classDetails-wrap">
            <div class="row">
                <div class="col-lg-4">
                    <div class="teacher_left">
                        <div class="teacher_delImg"> <img src="/user.webp" alt="Image"></div>
                    </div>
                </div>
                <?php $form = ActiveForm::begin(); ?>


                <div class="row">
                    <div class="col-md-6">
                        <?= $form->field($model, 'password')->passwordInput() ?>
                    </div>
                    <div class="col-md-6">
                        <?= $form->field($model, 'repassword')->passwordInput() ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <?= Html::submitButton('Saqlash', ['class' => 'btn btn-primary']) ?>
                    </div>
                </div>
                <?php ActiveForm::end(); ?>

            </div>
        </div>
        <!-- Teachers End -->

    </div>
</div>




















