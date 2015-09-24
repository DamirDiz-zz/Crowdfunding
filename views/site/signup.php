<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="create-form">
    <h1 class="form-title"><?= Html::encode($this->title) ?></h4>
        <p class="form-subtitle">Please fill out the following fields to signup</p>

        <div class="project-form">

            <div class="site-signup">
                <?php
                $form = ActiveForm::begin([
                            'id' => 'form-signup'
                ]);
                ?>

                <?= $form->field($model, 'firstname') ?>

                <?= $form->field($model, 'lastname') ?>

                <?= $form->field($model, 'email') ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <div class="form-group center-block text-center">
                    <?= Html::submitButton('Signup', ['class' => 'btn btn-fill btn-large', 'name' => 'signup-button']) ?>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
</div>