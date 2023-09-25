<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

use common\models\Social;

$foto = Social::find()->all();
/* @var $this yii\web\View */
/* @var $searchModel common\models\SocialSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Ijtimoiy Tarmoqlar');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="social-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Yangi Qo\'shish'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'url:url',
            'icon',
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
