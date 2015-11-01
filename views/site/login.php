<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="full-page-form-holder">
    <div class="full-page-form-medium">
        <div class="full-page-form-content">
            <div class="form-header">
                <h4 class="form-title">Schön dich wiederzusehen!</h4>
                <p class="form-subtitle">Gib deine E-Mail-Adresse und dein Passwort ein.</p>
            </div>
            <div class="project-form">

                <?php
                $form = ActiveForm::begin([
                            'id' => 'login-form',
                            'options' => ['class' => 'form-horizontal']
                ]);
                ?>

                <div class="row">
                    <div class="col-md-12"><?= $form->field($model, 'email')->label("E-Mail-Adresse") ?></div>
                </div>

                <div class="row">
                    <div class="col-md-12"><?= $form->field($model, 'password')->passwordInput()->label("Passwort") ?></div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <?=
                        $form->field($model, 'rememberMe')->checkbox();
                        ?>
                    </div>
                </div>

                <div class="row text-center">
                    <?= Html::submitButton('Anmelden', ['class' => 'btn btn-fill btn-large', 'name' => 'login-button']) ?>
                </div>

                <?php ActiveForm::end(); ?>

            </div>
        </div>
    </div>
</div>