<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Krossword */


$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ortga'), 'url' => ['index']];

?>
<div class="krossword-view">


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
                'label' => 'Rasm',
                'value' => function($foto){
                    return Html::img('/krossword/' . $foto['image'],
                        ['width' => '60px',
                            'heigth' => '100px'
                        ],
                    );
                },
            ],
            'lesson_name',
            'link',
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
