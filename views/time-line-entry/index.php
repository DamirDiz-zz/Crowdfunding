<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Time Line Entries';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="time-line-entry-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Time Line Entry', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'project_id',
            'title',
            'text:ntext',
            'created_at',
            // 'updated_at',
            // 'type_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
