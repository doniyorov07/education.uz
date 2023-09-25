<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Test');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="test-index">

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
                    return Html::img('/test/' . $foto['image'],
                        ['width' => '60px',
                            'heigth' => '100px'
                        ],
                    );
                },
            ],
            'lesson_name',
            'link',
            'status',
            [
                'class' => ActionColumn::className(),
            ],
        ],
    ]); ?>


</div>
