<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use common\models\Slider;

/* @var $this yii\web\View */
/* @var $searchModel common\models\SliderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Slayder');
$this->params['breadcrumbs'][] = $this->title;

$foto = Slider::find()->all();
?>
<div class="slider-index">

    <h1><?= Html::encode($this->title) ?></h1>

  

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
             [
                'attribute' => 'foto1',
                'format' => 'html',
                'label' => 'Foto1',
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
                'label' => 'Foto2',
                'value' => function($foto){
                    return Html::img('/slider/foto2/' . $foto['foto2'],
                        ['width' => '60px',
                         'heigth' => '100px'
                        ],
                    );
                },
            ],   
            //'title1',
            //'title2',
            //'text1',
            //'text2',
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
