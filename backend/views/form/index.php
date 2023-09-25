<?php 

use frontend\models\Form;
use yii\helpers\Url;
use yii\helpers\Html;

$form = Form::find()->all();


?>

  <table  class="table table-bordered">
    <thead>
      <tr>
        <th>ID</th>
        <th>Ism</th>
        <th>Email</th>
        <th>Xabar</th>
        <th></th>
      </tr>
    </thead>

    <tbody>
        <?php foreach($form as $key => $for) :?>

      <tr>
        <td><?= $for['id']?></td>
        <td><?= $for['name']?></td>
        <td><?= $for['email']?></td>
      <td><?= $for['message']?></td>
      <td><?= Html::a(Yii::t('app', 'O\'chirish'), ['delete', 'id' => $for->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Haqqatdan ma\'lumotni o\'chirmoqchimisiz'),
                'method' => 'post',
            ],
        ]) ?></td>
      </tr>
     
  <?php endforeach; ?>
    </tbody>
  </table>