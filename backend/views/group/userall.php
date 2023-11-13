<?php


use yii\helpers\Html;

$this->title = 'Foydalanuvchilar';

/**
 * @var $model[]
 * @var $pagination[]
 */

?>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Foydalanuvchilar ro'yxati</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                    <tr>
                        <th>Familiya</th>
                        <th>Ism</th>
                        <th>Email</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($model as $item) :?>
                        <tr>
                            <td><?=$item->last_name?></td>
                            <td><?=$item->first_name?></td>
                            <td><?=$item->email?></td>
<!--                            <td>--><?php //= $item->group ? $item->group->group_name: 'Guruh o\'chirilgan' ?><!--</td>-->
                            <td>
                                <?php
                                if ($item->status == 10) {
                                    echo Html::a('<i class="badge badge-success">Faol</i>', ['change-user', 'id' => $item->id]);
                                } else {
                                    echo Html::a('<i class="badge badge-danger">Faol emas</i>', ['change-user', 'id' => $item->id]);
                                }
                                ?>
                            </td>
                        </tr>
                    <?php endforeach;?>
                    </tbody>
                </table>
                <?php
                echo \yii\bootstrap4\LinkPager::widget([
                    'pagination' => $pagination,
                ]);
                ?>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>




