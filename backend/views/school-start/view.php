<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\SchoolStart */


$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'School Starts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="school-start-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Tahrirlash'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'O\'chirish'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
             [
                'attribute' => 'image',
                'format' => 'html',
                'label' => 'Image',
                'value' => function($foto){
                    return Html::img('/school/' . $foto['image'],
                        ['width' => '60px',
                         'heigth' => '60px'
                        ],
                    );
                },
            ],   
            'title',
            'text',
             [
            'attribute'=>'status',
            'format' => 'raw',
            'value' => function($foto){
             if ($foto->status === 1)
            {
                return '<i class="badge badge-success">Faol</i>';
            }else
            {
                return '<i class="badge badge-danger">Faol emas</i>';
            };
                },
              
            ],
        ],
    ]) ?>

</div>
