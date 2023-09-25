<?php

use kartik\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\testmanager\models\search\SubjectSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Fanlar';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="subject-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Yangi fan qo\'shish', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'panel' => [
            'type' => GridView::TYPE_PRIMARY
        ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'name',
                'format' => 'raw',
                'value' => function ($model) {
                    /** @var \backend\modules\testmanager\models\Subject $model */
                    return Html::a($model->name, ['question/index', 'subject_id' => $model->id], ['data-pjax' => 0]);
                }
            ],
            'is_free:boolean',
            'price:integer',
            'tests_count',
            'duration',
            [
                'attribute' => 'status',
                'filter' => [
                    1 => 'Faol',
                    0 => 'Nofaol',
                ],
                'value' => function ($model) {
                    /** @var \backend\modules\testmanager\models\Subject $model */
                    return $model->status ? 'Faol' : 'Nofaol';
                }
            ],
            'show_answer:boolean',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
