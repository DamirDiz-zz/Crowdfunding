<?php
/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Crowdfunding';
?>

<section class="hero">
    <div class="hero-content">
        <div class="hero-content-holder text-center">
            <h1>Fang an zu gartl'n!</h1>
            <p class="intro">Gartln.at hilft dir ökologische, nachhaltige und grüne Projekte in deiner Nachbarschaft umzusetzen. <br>
            Wir verbinden Menschen um schöne und nachhaltige Viertel zu schaffen.</p>
            <?= Html::a('Starte dein Projekt', ['/project/create'], ['class' => 'btn btn-fill btn-large']) ?>
        </div>

    </div>
    <div class="hero-image"></div>
</section>

<section class="main-section">
    <div class="container-elements clearfix">
        <div class="pull-left"><h3>Beliebte Projekte</h3></div>
        <div class="pull-right"><?= Html::a('Alle Projekte', ['/project/all'], ['class' => 'btn btn-medium']) ?></div>
    </div>

    <div class="project-box-container">
        <?php foreach ($projects as $project) { ?>
            <div class="project-box">
                <div class="project-box-header">
                    <div class="project-box-header-content">
                        <div class="project-box-header-content-holder">
                            <a href="<?php echo Yii::$app->getUrlManager()->createUrl(['project/detail', 'id' => (int) $project->id]); ?>"><h1 class="text-center text-uppercase"><?php echo $project->title; ?></h1></a>
                            <h2 class="text-center text-capitalize"><?php echo $project->location; ?></h2>
                        </div>
                    </div>
                    <div class="project-box-header-category"><p><?php echo $project->category->title; ?></p></div>
                    <div class="project-box-header-imageholder" style="background-image: url(<?php echo $project->getImagePath() ?>);"></div>
                </div>
                <div class="project-box-body">
                    
                    <?php 
                    $initiator = $project->getInitiator();
                    
                    if ($initiator != null) {
                    $initiatoravatar = $initiator->getImagePath();?>
                    <div class="project-box-body-users clearfix">
                        <img class="project-box-body-avatar" src="<?php echo "../" . $initiatoravatar ?>" alt="<?php echo $initiator->firstname; ?>">
                        <p class="project-box-body-user-title"><?php echo $initiator->firstname; ?> hat das Projekt gestartet.</p>
                        <p class="project-box-body-user-subtitle"><em>4 weitere Leute machen mit.</em></p>
                    </div>
                    <?php } ?>
                    <div class="project-box-body-description"><?php echo $project->shortDescription; ?></div>
                </div>
            </div>
        <?php } ?>
    </div>
</section>

<section class="main-section">
    <div class="container-elements clearfix">
        <div class="pull-left"><h3>Suche nach Kategorien</h3></div>
    </div>
    
    <div class="category-box-container">
        
        <?php foreach ($categories as $category) { ?>

        <div class="category-box">
            <div class="category-box-content">
                <div class="category-box-content-holder">
                    <a href="<?php echo Yii::$app->getUrlManager()->createUrl(['project/discover', 'categoryId' => (int) $category->id]); ?>"><h1 class="text-center text-uppercase"><?php echo $category->title; ?></h1></a>
                    <div class="project-count">10 Projekte</div>
                </div>
            </div>
            <div class="category-box-imageholder" style="background-image: url(<?php echo $category->getTitleImage(); ?>);"></div>

        </div>
        
        <?php } ?>
        
    </div>
</section>
