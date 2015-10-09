<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="create-form">

    <div class="site-login">
        <h1 class="form-title">Schön dich wiederzusehen!</h4>
            <p class="form-subtitle">Gib deine E-Mail-Adresse und dein Passwort ein.</p>

            <div class="project-form">

                <?php
                $form = ActiveForm::begin([
                            'id' => 'login-form',
                            'options' => ['class' => 'form-horizontal'],
//                            'fieldConfig' => [
//                                'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
//                                'labelOptions' => ['class' => 'col-lg-1 control-label'],
//                            ],
                ]);
                ?>

                <div class="row">
                    <div class="col-md-6 col-md-offset-3"><?= $form->field($model, 'email')->label("E-Mail-Adresse") ?></div>
                </div>


                <div class="row">
                    <div class="col-md-6 col-md-offset-3"><?= $form->field($model, 'password')->passwordInput()->label("Passwort") ?></div>
                </div>

                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <?=
                            $form->field($model, 'rememberMe')->checkbox();                        
                        ?>
                    </div>
                </div>

                <div class="form-group center-block text-center">
                        <?= Html::submitButton('Anmelden', ['class' => 'btn btn-fill btn-large', 'name' => 'login-button']) ?>
                </div>

                <?php ActiveForm::end(); ?>

            </div>
    </div>
</div>
