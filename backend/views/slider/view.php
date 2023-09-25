<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Slider */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Slayder'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="slider-view">

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
                'attribute' => 'foto1',
                'format' => 'html',
                'label' => 'Image',
                'value' => function($foto){
                    return Html::img('/slider/foto1/' . $foto['foto1'],
                        ['width' => '60px',
                         'heigth' => '100px'
                        ],
                    );
                },
            ],   
            [
                'attribute' => 'foto2',
                'format' => 'html',
                'label' => 'Image',
                'value' => function($foto){
                    return Html::img('/slider/foto2/' . $foto['foto2'],
                        ['width' => '60px',
                         'heigth' => '100px'
                        ],
                    );
                },
            ],   
            'title1',
            'title2',
            'text1',
            'text2',
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
