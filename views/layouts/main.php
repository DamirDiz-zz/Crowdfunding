<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use app\assets\AppAsset;
use app\models\Project;
use app\models\User;

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
                                    <li><?= Html::a("So funktioniert's", ['site/howitworks']) ?></li>
                                    <li><?= Html::a("Starte dein Projekt", ['/project/create']) ?></li>

                                </ul>
                                <ul class="member-actions">
                                    <?php if (Yii::$app->user->isGuest) { ?>
                                    <li><?= Html::a('Login', ['/site/login']) ?></li>
                                    <li><?= Html::a('Registrieren', ['/site/signup'], ['class' => 'btn btn-small']) ?></li>

                                    <?php } else { ?>
                                    <li><?= Html::a('Logout', ['/site/logout'], ['data-method' => 'post'] )?></li>
                                    <?php 
                                    $user = User::findById(Yii::$app->user->id);
                                    $avatar = $user->getImagePath();
                                    ?>
                                    <li><img class="header-avatar" src="<?php echo $avatar ?>" alt="<?php echo $user->firstname; ?>"></li>
                                    <?php } ?>
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
