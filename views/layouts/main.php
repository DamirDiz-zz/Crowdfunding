<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use app\assets\AppAsset;

AppAsset::register($this);
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

        <div class="wrap">
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
                                    <li><a href="#blog">Entdecken</a></li>
                                    <li><a href="#download">Über uns</a></li>
                                    <li><a href="#download" class="login">Login</a></li>
                                    <li><?= Html::a('Starte dein Projekt', ['/project/create'], ['class' => 'btn btn-small']) ?></li>
                            </nav>
                        </div>
                    </div>
                </header>
            </section>

            <div class="container-fluid">
                <?= $content ?>
            </div>
        </div>

        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
