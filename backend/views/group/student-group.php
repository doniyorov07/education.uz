<?php




$this->title = 'Foydalanuvchilar';

/**
 * @var $student[]
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
                        <th>Familiya</th>
                        <th>Ism</th>
                        <th>Ko'rish</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($student as $item) :?>
                        <tr>
                            <td><?=$item->student->last_name?></td>
                            <td><?=$item->student->first_name?></td>
                            <td>
                                <?= \yii\helpers\Html::a('<i class="fas fa-eye" aria-hidden="true"></i>', ['tasks', 'id' => $item->student->id], [
                                    'class' => 'btn btn-primary',
                                ]) ?>
                            </td>
                        </tr>
                    <?php endforeach;?>
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>






