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
        <h1 class="form-title"><?= Html::encode($this->title) ?></h4>
            <p class="form-subtitle">Please fill out the following fields to login</p>

            <div class="project-form">

                <?php
                $form = ActiveForm::begin([
                            'id' => 'login-form',
                            'options' => ['class' => 'form-horizontal'],
                            'fieldConfig' => [
                                'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
                                'labelOptions' => ['class' => 'col-lg-1 control-label'],
                            ],
                ]);
                ?>

                <?= $form->field($model, 'email') ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <?=
                $form->field($model, 'rememberMe')->checkbox([
                    'template' => "<div class=\"col-lg-offset-1 col-lg-3\">{input} {label}</div>\n<div class=\"col-lg-8\">{error}</div>",
                ])
                ?>

                <div class="form-group">
                    <div class="col-lg-offset-1 col-lg-11">
                <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                    </div>
                </div>

                <?php ActiveForm::end(); ?>

                <div class="col-lg-offset-1" style="color:#999;">
                    You may login with <strong>admin/admin</strong> or <strong>demo/demo</strong>.<br>
                    To modify the email/password, please check out the code <code>app\models\User::$users</code>.
                </div>
            </div>
    </div>
</div>
