<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use app\assets\AppAsset;
use app\models\Project;

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
                                </ul>
                                <ul class="member-actions">
                                    <?php if (Yii::$app->user->isGuest) { ?>
                                    <li><?= Html::a('Login', ['/site/login']) ?></li>
                                    <li><?= Html::a('Registrieren', ['/site/signup']) ?></li>
                                    <?php } else { ?>
                                    <li><?= Html::a('Logout', ['/site/logout'], ['data-method' => 'post'] )?></li>
                                    <?php } ?>
                                    <li><?= Html::a('Starte dein Projekt', ['/project/create'], ['class' => 'btn btn-fill btn-small']) ?></li>
                                </ul>
                            </nav>
                                                        
                        </div>
                    </div>
                </header>
            </section>

            <?= $content ?>
        </div>
        
<?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
