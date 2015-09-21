<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\TimeLineEntry */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Time Line Entries', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="time-line-entry-view">

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
            'project_id',
            'title',
            'text:ntext',
            'created_at',
            'updated_at',
            'type_id',
        ],
    ]) ?>

</div>
