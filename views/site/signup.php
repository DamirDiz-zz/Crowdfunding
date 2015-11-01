<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Registrieren';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="full-page-form-holder">
    <div class="full-page-form-large">
        <div class="form-header">
            <h4 class="form-title"><?= Html::encode($this->title) ?></h4>
            <p class="form-subtitle">Erzähl ein bisschen über dich und melde dich an</p>
        </div>
        <div class="full-page-form-content">
            <div class="project-form">

                <div class="site-signup">
                    <?php
                    $form = ActiveForm::begin([
                                'id' => 'form-signup',
                                'options' => ['enctype' => 'multipart/form-data'],
                    ]);
                    ?>

                    <div class="row">
                        <div class="col-md-6"><?= $form->field($model, 'firstname')->label("Vorname") ?></div>
                        <div class="col-md-6"><?= $form->field($model, 'lastname')->label("Nachname") ?></div>
                    </div>
                    <div class="row">
                        <div class="col-md-12"><?= $form->field($model, 'organisationName')->label("Falls Sie einer Organisation angehören können Sie diese hier angeben.") ?></div>
                    </div>
                    <div class="row">
                        <div class="col-md-6"><?= $form->field($model, 'email')->label("E-Mail-Adresse") ?></div>
                        <div class="col-md-6"><?= $form->field($model, 'password')->passwordInput()->label("Passwort") ?></div>
                    </div>
                    <div class="row">
                        <div class="col-md-12"><?= $form->field($model, 'avatarImage')->fileInput(array("class" => "inputfile"))->label("Lade ein Profilbild hoch") ?></div>
                    </div>

                    <div class="row text-center">
                        <?= Html::submitButton('Signup', ['class' => 'btn btn-fill btn-large', 'name' => 'signup-button']) ?>
                    </div>

                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>