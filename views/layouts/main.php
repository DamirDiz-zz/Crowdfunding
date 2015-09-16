<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use app\assets\AppAsset;
use yii\widgets\ActiveForm;
use app\models\Project;
use app\models\Category;
use yii\helpers\ArrayHelper;

AppAsset::register($this);

$newproject = new Project();

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
<?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body>
<?php $this->beginBody() ?>

        <div class="content">
<?php
/**
  NavBar::begin([
  'brandLabel' => '',
  'brandUrl' => Yii::$app->homeUrl,
  'options' => [
  'class' => 'navbar navbar-fixed-top',
  ],
  ]);
  echo Nav::widget([
  'options' => ['class' => 'navbar-nav navbar-right'],
  'items' => [
  ['label' => 'About', 'url' => ['/site/about']],
  Yii::$app->user->isGuest ?
  ['label' => 'Login', 'url' => ['/site/login']] :
  [
  'label' => 'Logout (' . Yii::$app->user->identity->username . ')',
  'url' => ['/site/logout'],
  'linkOptions' => ['data-method' => 'post']
  ],
  ['label' => 'Start your Project', 'url' => ['/project/create'], 'linkOptions'=> array('class' => 'btn btn-success')],
  ],
  ]);
  NavBar::end();
 * */
?>


            <section class="navigation">
                <header>
                    <div class="header-content">
                        <div class="header-nav">
                            <nav>
                                <ul class="primary-nav">
                                    <li><?= Html::a('Home', ['/']) ?></li>
                                    <li><a href="#blog">Entdecken</a></li>
                                    <li><a href="#download">Über uns</a></li>
                                    <li><a href="#download" class="login">Login</a></li>
                                    <li><button id="start-project-button" type="button" data-toggle="modal" data-target="#start-project-modal" class="btn btn-small">Starte dein Projekt</button></li>
                            </nav>
                        </div>
                    </div>
                </header>
            </section>

<?= $content ?>
        </div>


        <!-- Modal -->
        <div class="modal fade" id="start-project-modal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Starte dein Projekt</h4>
                        <p class="modal-subtitle">Erzähle uns ein bisschen über deine Idee</p>
                    </div>
                    <div class="modal-body">
                        <div class="project-form">

                            <?php $form = ActiveForm::begin([
                                'action' => 'project/create', 
                                'enableClientValidation' => false,
                                'options' => ['enctype' => 'multipart/form-data'],
                                'fieldConfig' => [
                                    'template' => "{label}\n{input}\n{hint}\n{error}",
                                    //'horizontalCssClasses' => [
                                    //    'label' => 'col-sm-4',
                                    //    'offset' => 'col-sm-offset-4',
                                    //    'wrapper' => 'col-sm-8',
                                    //    'error' => '',
                                    //    'hint' => '',
                                    //],
                                ],
                            ]); ?>

                            <?= $form->field($newproject, 'title')->textInput(['maxlength' => true])->label("Gib deinem Projekt einen Namen") ?>

                            <div class="row">
                                <div class="col-md-8">
                                    <?= $form->field($newproject, 'shortDescription')->textarea(['rows' => 5])->hint("Beschreibe in 3-4 Sätzen worum es bei deiner Idee geht und was deine Nachbarschaft davon hat.")->label("Worum geht's?") ?>
                                </div>
                                <div class="col-md-4">
                                    <?= $form->field($newproject, 'location')->textInput(['maxlength' => true])->label("Wo?") ?>
                                </div>
                            </div>

                            <?= $form->field($newproject, 'mainImage')->fileInput()->hint("Ein Bild sagt mehr als tausend Worte. Zeig uns den Ort den du verändern möchtest.")->label("Lade ein Bild hoch") ?>

                            <?php
                            $models = Category::find()->asArray()->all();
                            $map = ArrayHelper::map($models, 'id', 'title'); // (where 'id' becomes the value and 'name' the name of the value which will be displayed)
                            ?>
                            <?= $form->field($newproject, 'category_id')->dropDownList($map)->label("In welche Kategorie passt dein Projekt?") ?>

                            <div class="form-group center-block">
                                    <?= Html::submitButton('Leg los', ['class' => 'btn-fill btn-large center-block' ]) ?>
                            </div>
                            <?php ActiveForm::end(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>


<?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
