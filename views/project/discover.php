<?php
/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Crowdfunding';
?>

<section class="hero-special">
    <div class="hero-content">
        <div class="hero-content-holder text-center">
            <h1><?php echo $category->title;?></h1>
            <p class="description"><?php echo $category->description;?></p>
        </div>

    </div>
    <div class="hero-image" style="background-image: url(<?php echo $category->getTitleImage(); ?>);"></div>
</section>

<section class="main-section">
    
    <div class="project-box-filter"><span>Sortieren nach</span>
        <ul>
            <li class="active">Neu</li>
            <li>Beliebt</li>
            <li>Empfohlen</li>
            <li>Benötigt Helfer</li>
            <li>Alle</li>
        </ul>
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
