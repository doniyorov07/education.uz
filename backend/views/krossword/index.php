<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Krossword');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="krossword-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Yangi Qo\'shish'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
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
            [
                'class' => ActionColumn::className(),
            ],
        ],
    ]); ?>


</div>
