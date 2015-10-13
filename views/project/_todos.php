<?php

use yii\helpers\Html;

?>

<div id="todo-list" class="todo-list editable" data-todo-action-url="<?php echo Yii::$app->urlManager->createUrl('project/savetodo'); ?>">
    <div id="todo-list-items">
    </div>

    <div class="todo-list-add">
        <div class="todo-icon-add"></div>
        <div class="todo-text-add">Aufgabe hinzufügen</div>
    </div>
</div>

<div class="center-block text-center">
    <?= Html::a('Fertig', ['/project/create', 'id' => (int) $project->id, 'isNew'=> true], ['class' => 'btn btn-fill btn-large']) ?>
</div>