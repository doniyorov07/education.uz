<?php

use frontend\assets\MathXmlViewer;
use kartik\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $subject \backend\modules\testmanager\models\Subject */
/* @var $searchModel backend\modules\testmanager\models\search\QuestionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */



$this->title = 'Testlar';
$this->params['breadcrumbs'][] = ['label' => 'Fanlar', 'url' => ['subject/index']];
$this->params['breadcrumbs'][] = $subject->name;
$this->params['breadcrumbs'][] = $this->title;


?>
<div class="question-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a("<i class='fa fa-plus'></i> Test qo'shish", ['create', 'subject_id' => $subject->id], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
        ],
        'condensed' => true,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'class' => '\kartik\grid\ExpandRowColumn',
                'attribute' => 'title',
                'format' => 'raw',
                'value' => function () {
                    return GridView::ROW_COLLAPSED;
                },
                'detailRowCssClass' => 'white-color',
                'expandOneOnly' => true,
                'detail' => function ($model) {
                    return $this->render('_question_detail', ['model' => $model]);
                }
            ],
            [
                'attribute' => 'title',
                'format' => 'raw',
                'width' => '70%'
            ],
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
            [
                'class' => 'yii\grid\ActionColumn',
            ],
        ],
    ]); ?>


</div>
