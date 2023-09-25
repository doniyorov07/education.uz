<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Practica */


$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Amaliy Tajriba'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="practica-view">

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
            'type_id',
             [
                'attribute' => 'image',
                'format' => 'html',
                'label' => 'Image',
                'value' => function($foto){
                    return Html::img('/practica/image/' . $foto['image'],
                        ['width' => '60px',
                         'heigth' => '100px'
                        ],
                    );
                },
            ],   
            'title',
            'file',
            'video_url',
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
