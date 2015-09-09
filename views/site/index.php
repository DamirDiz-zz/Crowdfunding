<?php
/* @var $this yii\web\View */

$this->title = 'Crowdfunding';
?>
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
                <div class="project-box-header-category"><p>Kategorie</p></div>
                <div class="project-box-header-imageholder" style="background-image: url(<?php echo $project->getImagePath() ?>);"></div>
            </div>
            <div class="project-box-body">
                <div class="project-box-body-description"><?php echo $project->shortDescription; ?></div>
            </div>
        </div>
    <?php } ?>
</div>
