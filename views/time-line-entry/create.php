<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TimeLineEntry */

$this->title = 'Create Time Line Entry';
$this->params['breadcrumbs'][] = ['label' => 'Time Line Entries', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="time-line-entry-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
