<?php

use yii\helpers\Html;
use app\models\Todo;
?>
<div id="todo-list" class="todo-list editable" data-todo-action-url="<?php echo Yii::$app->urlManager->createUrl(['project/savetodo', 'projectId' => (int) $project->id]); ?>">
    <div id="todo-list-items">
        <?php if (count($todos) > 0) { ?>
            <?php foreach ($todos as $todo) { ?>
                <div class="todo-list-entry" data-todo-id="<?php echo $todo->id; ?>" data-todo-content="<?php echo $todo->content; ?>" data-todo-edited="0">
                    <div class="todo-icon"></div>
                    <div class="todo-text"><?php echo $todo->content; ?></div>
                    <div class="todo-action pull-right">
                        <div class="todo-icon-edit"></div>
                        <div class="todo-icon-delete"></div>
                    </div>
                </div>
            <?php }
        }
        ?>
    </div>

    <div class="todo-list-add">
        <div class="todo-icon-add"></div>
        <div class="todo-text-add">Aufgabe hinzufügen</div>
    </div>
</div>

<div class="center-block text-center">
<?= Html::a('Fertig', ['/project/create', 'id' => (int) $project->id, 'isNew' => true], ['class' => 'btn btn-fill btn-large']) ?>
</div>