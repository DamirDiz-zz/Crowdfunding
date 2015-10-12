<?php

use yii\helpers\Html;

?>

<div class="todo-list editable">
    <div id="todo-list-items">
        <div class="todo-list-entry" data-todo-id="1" data-todo-content="Hier steht ein nices todo 1" data-todo-edited="0">
            <div class="todo-icon"></div>
            <div class="todo-text"></div>
            <div class="todo-action pull-right">
                <div class="todo-icon-edit"></div>
                <div class="todo-icon-delete"></div>
            </div>
        </div>
    </div>

    <div class="todo-list-add">
        <div class="todo-icon-add"></div>
        <div class="todo-text-add">Aufgabe hinzufügen</div>
    </div>
</div>

<div class="center-block text-center">
    <?= Html::a('Fertig', ['/project/create', 'id' => (int) $project->id, 'isNew'=> true], ['class' => 'btn btn-fill btn-large']) ?>
</div>