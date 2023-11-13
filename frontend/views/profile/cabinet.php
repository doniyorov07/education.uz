<?php


/**
 * @var \common\models\User $first_name
 * @var \common\models\User $last_name
 * @var \common\models\User $user
 * @var \common\models\User $email
 */
\dominus77\sweetalert2\Alert::widget(['useSessionFlash' => true]);
?>


<div class="innerHeading-wrap">
    <div class="container">
        <h1>Foydalanuvchi ma'lumotlari</h1>
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
                <div class="col-lg-8">
                    <div class="teacher_del ">
                        <div class="float-right" style="margin-bottom:10px">
                            <div id="w2" class="btn-group">
                                <a id="w3" class="btn btn-outline-primary" href="<?=\yii\helpers\Url::to('update')?>" title="" data-toggle="tooltip" data-placement="bottom" data-trigger="hover" data-original-title="Shaxsiy ma'lumotlarni tahrirlash">
                                    <i class="fa fa-edit"></i> Tahrirlash</a>
                                <a id="w6" class="btn btn-outline-info" href="<?=\yii\helpers\Url::to(['/profile-manager/default/change-password'])?>" title="" data-toggle="tooltip" data-placement="bottom" data-trigger="hover" data-original-title="Telefon raqamni o'zgartirish">
                                    <i class="fa fa-key"></i> Parolni o'zgartirish</a>
                            </div>
                        </div>
                        <table class="table">
                            <tbody>
                            <tr>
                                <th scope="row">Familiya</th>
                                <th scope="row"><?=$last_name?></th>
                            </tr>
                            <tr>
                                <th scope="row">Ism</th>
                                <th scope="row"><?=$first_name?></th>
                            </tr>
                            <tr>
                                <th scope="row">Guruh</th>
                                <th>
                                    <?php
                                    foreach ($user->userGroups as $item) {
                                        if ($item->group->group_name == null) {
                                            echo 'Guruhga birikitirilmagasiz';
                                        } else {
                                            echo $item->group->group_name;
                                        }
                                    }
                                    ?>
                                </th>
                            </tr>
                            <tr>
                                <th scope="row">Email</th>
                                <th><?=$email ?></th>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- Teachers End -->

    </div>
</div>

