<?php


use yii\helpers\Html;

$this->title = 'Topshiriqlar';

/**
 * @var $task[]
 * @var $pagination[]
 */

?>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Guruhga biriktirilgan Foydalanuvchilar </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                    <tr>
                        <th>Topshiriq raqami</th>
                        <th>Vaqt</th>
                        <th>Ko'rish</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php foreach ($task as $item) : ?>
                        <tr>
                            <td><i class="badge badge-success"><?= $item->taskNumber->task_number ?></i></td>
                            <td><?= $item->datetime ?></td>
                            <td>
                                <?= Html::a('<i class="fa fa-download">Download</i>', ['download', 'id' => $item->task_id], [ 'class' => 'btn btn-primary'])?>
                            </td>
                        </tr>
                    <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>






