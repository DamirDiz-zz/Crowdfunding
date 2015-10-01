<?php


/* @var $this yii\web\View */
/* @var $model app\models\Project */

$this->title = 'Was ist zu tun?';
?>

<div class="create-form">

    <h1 class="form-title">Was ist zu tun?</h4>
    <p class="form-subtitle">Beschreibe kurz ein paar Aufgaben die zu erlidgen sind bei denen du Hilfe benötigen könntest.</p>

    <?= $this->render('_todos', [
        'model' => $model,
    ]) ?>

</div>
