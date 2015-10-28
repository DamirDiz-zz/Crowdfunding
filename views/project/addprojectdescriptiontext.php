<?php


use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Füge einen Text zu deinem Projekt';
?>

<div class="full-page-form-large">
    <div class="full-page-form-holder">
        <div class="full-page-form-content">
            <h1 class="form-title">Text hinzufügen</h4>

            <div class="project-form">
                <?php
                
                $form = ActiveForm::begin([
                            'action' => 'addprojectdescription',
                            'fieldConfig' => [
                                'template' => "{label}\n{input}\n{hint}\n{error}",
                            ],
                ]);
                ?>
                <?= $form->field($projectDescription, 'project_id')->hiddenInput(['value'=> $project->id])->label(false); ?>
                <?= $form->field($projectDescription, 'type')->hiddenInput(['value'=> '0'])->label(false); ?>
                <?= $form->field($projectDescription, 'description')->hiddenInput(['value'=> ''])->label(false); ?>
                <?= $form->field($projectDescription, 'value')->textarea(['rows' => 6])->label("Fügen Sie hier einen Beschreibungstext ein") ?>

                <div class="form-group center-block text-center">
                    <?= Html::submitButton('Speichern', ['class' => 'btn btn-fill btn-large']) ?>
                </div>
                <?php ActiveForm::end(); ?>

            </div>
        </div>
    </div>
    <div class="full-page-form-background"></div>
</div>
