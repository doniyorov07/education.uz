<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use backend\modules\testmanager\models\Subject;

$subjectsMap = ArrayHelper::map(Subject::find()->asArray()->all(), 'id', 'name');

return [
    [
        'class' => 'kartik\grid\CheckboxColumn',
        'width' => '20px',
    ],
    [
        'class' => 'kartik\grid\SerialColumn',
        'width' => '30px',
    ],

    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'userFullName',
        'label' => 'Foy.chi',
        'format' => 'raw',
        'value' => function ($model) {
            return Html::a(isset($model->user->full_name) ? $model->user->full_name : 'User', ['view', 'id' => $model->id], ['data-pjax' => 0]);
        },

    ],

    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'subject_id',
        'value' => 'subject.name',
        'filter' => $subjectsMap,
        'label' => "Fan",
        'hAlign' => 'center'

    ],

    [
        'attribute' => 'price',
        'value' => 'priceText',
        'format' => 'raw',
        'filter' => [
            2 => 'Bepul',
            1 => 'Pullik'
        ],
        'hAlign' => 'center'

    ],

    [
        'attribute' => 'started_at',
        'value' => 'formattedStartedTime',
        'filter' => false,
        'hAlign' => 'center'

    ],

    [
        'attribute' => 'finished_at',
        'value' => 'formattedFinishedTime',
        'filter' => false,
        'hAlign' => 'center'

    ],

    [
        'attribute' => 'tests_count',
        'filter' => false,
        'hAlign' => 'center'
    ],

    [
        'attribute' => 'correct_answers',
        'filter' => false,
        'hAlign' => 'center'
    ],

    'formattedPercent',
    [
        'class' => 'kartik\grid\ActionColumn',
        'dropdown' => false,
        'template' => '{view} {delete}',
        'vAlign' => 'middle',
        'urlCreator' => function ($action, $model, $key, $index) {
            return Url::to([$action, 'id' => $key]);
        },
        'viewOptions' => [ 'title' => "Ko'rish", 'data-toggle' => 'tooltip'],
        'updateOptions' => ['role' => 'modal-remote', 'title' => 'Update', 'data-toggle' => 'tooltip'],
        'deleteOptions' => ['role' => 'modal-remote', 'title' => "O'chirish",
            'data-confirm' => false, 'data-method' => false,// for overide yii data api
            'data-request-method' => 'post',
            'data-toggle' => 'tooltip',
            'data-confirm-title' => 'Are you sure?',
            'data-confirm-message' => 'Are you sure want to delete this item'],
    ],

];   