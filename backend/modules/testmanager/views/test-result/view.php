<?php

use backend\modules\testmanager\models\TestResultItem;
use kartik\grid\SerialColumn;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\testmanager\models\TestResult */

$this->title = 'Test natijasi #' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Test natijalari', 'url' => 'index'];
$this->params['breadcrumbs'][] = $this->title;

$dataProvider = new \yii\data\ActiveDataProvider([
    'query' => $model->getTestResultItems()->with(['question', 'userAnswer']),
    'pagination' => [
        'defaultPageSize' => 100
    ]
]);
\frontend\assets\MathXmlViewer::register($this);

?>
<div class="test-result-view">


    <?= \kartik\grid\GridView::widget([

        'dataProvider' => $dataProvider,
        'pjax' => false,
        'condensed' => true,
        'panel' => [
            'type' => 'primary',
            'heading' => '<i class="glyphicon glyphicon-list"></i> Test natijalari',
        ],
        'columns' => [
            [
                'class' => SerialColumn::class,
            ],
            [
                'label' => "Savol matni",
                'format' => 'raw',
                'value' => function ($model) {
                    /** @var TestResultItem $model */
                    if ($model->question) {
                        return Html::a($model->question->title, ['question/view', 'id' => $model->question_id], ['data-pjax' => 0]);
                    } else {
                        return Html::tag('i', 'Savol topilmadi!', ['class' => 'text-danger']);
                    }
                }
            ],
            'question.title:raw',
            'userAnswerText:raw',
            'answerIcon:raw'
        ]


    ]) ?>

</div>
