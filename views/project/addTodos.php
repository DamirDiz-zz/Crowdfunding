<?php

$this->registerJsFile('@web/js/Todos.js', ['position' => \yii\web\View::POS_END, 'depends' => [\yii\web\JqueryAsset::className()]]);

/* @var $this yii\web\View */
/* @var $proejct app\models\Project */

$this->title = 'Was ist zu tun?';
?>

<div class="full-page-form-holder">
    <div class="full-page-form-large">
        <div class="form-header">
            <h4 class="form-title">Was ist zu tun?</h4>
            <p class="form-subtitle">Beschreibe kurz ein paar Aufgaben die zu erledigen sind bei denen du Hilfe benötigen könntest.</p>
        </div>
        <div class="full-page-form-content">

                <?=
                $this->render('_todos', [
                    'project' => $project,
                    'todos' => $todos,
                ])
                ?>

        </div>
    </div>
</div>