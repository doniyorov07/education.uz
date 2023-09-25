<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\testmanager\models\Question */

$this->title =
$this->params['breadcrumbs'][] = ['label' => 'Testlar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
// \frontend\assets\MathXmlViewer::register($this);

$this->title = "#" . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Fanlar', 'url' => ['subject/index']];
$this->params['breadcrumbs'][] = ['label' => isset($model->subject->name) ? $model->subject->name : 'Fan', 'url' => ['question/index', 'subject_id' => $model->subject_id]];
$this->params['breadcrumbs'][] = $this->title;


$dataProvider = new \yii\data\ActiveDataProvider([
    'query' => $model->getOptions(),
]);


?>
<div class="row">

    <div class="col-12">
        <h1><?= Html::encode($this->title) ?></h1>

        <p>
            <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]) ?>
        </p>

        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'id',
                'title:raw',
                'subject.name',
                'created_at:datetime',
                'updated_at:datetime',
            ],
        ]) ?>
    </div>
</div>

<div class="row mt-2">


    <div class="col-12">

        <h3 align="center">Variantlar</h3>
        <hr>
        <?= \yii\grid\GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                'text:raw:Variant',
                "isAnswerIcon:raw:To'g'ri/Xato"
            ]
        ]) ?>
    </div>

</div>