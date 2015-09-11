<?php
/* @var $this yii\web\View */

$this->title = 'Crowdfunding';
?>

<section class="hero">
    <div class="hero-content">
        <div class="hero-content-holder text-center">
             <h1>Mach deine Stadt grüner!</h1>
            <p class="intro">Crowdfunding für ökologische, nachhaltige und grüne Projekte</p>
            <a href="#" class="btn btn-accent btn-large">Erfahre mehr</a>
        </div>
    </div>
    <div class="hero-image"></div>
</section>

<div class="project-box-container">
    <?php foreach ($projects as $project) { ?>
        <div class="project-box">
            <div class="project-box-header">
                <div class="project-box-header-content">
                    <div class="project-box-header-content-holder">
                        <h1 class="text-center text-uppercase"><?php echo $project->title; ?></h1>
                        <h2 class="text-center text-capitalize"><?php echo $project->location; ?></h2>
                    </div>
                </div>
                <div class="project-box-header-category"><p><?php echo $project->category->title; ?></p></div>
                <div class="project-box-header-imageholder" style="background-image: url(<?php echo $project->getImagePath() ?>);"></div>
            </div>
            <div class="project-box-body">
                <div class="project-box-body-description"><?php echo $project->shortDescription; ?></div>
            </div>
        </div>
    <?php } ?>
</div>
