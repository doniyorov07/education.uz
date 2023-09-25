<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;

use kartik\file\FileInput;
use kartik\switchinput\SwitchInput;
use common\models\Nevs;

$foto = Nevs::find()->all();

/* @var $this yii\web\View */
/* @var $searchModel common\models\NevsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Yangiliklar');

?>
<div class="nevs-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Yangi Q\'shish'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'views_count',
             [
                'attribute' => 'image',
                'format' => 'html',
                'label' => 'Rasm',
                'value' => function($foto){
                    return Html::img('/news/' . $foto['image'],
                        ['width' => '60px',
                         'heigth' => '100px'
                        ],
                    );
                },
            ],   
            //'video_url:url',
            //'title',
            //'text',
            //'batafsil:ntext',
            'date',
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

    <?php Pjax::end(); ?>

</div>
