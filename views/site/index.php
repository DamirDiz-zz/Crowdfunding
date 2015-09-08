<?php
/* @var $this yii\web\View */

$this->title = 'Crowdfunding';
?>
<div class="project-box-container">
    <?php foreach ($projects as $project) { ?>
        <div class="project-box">
            <img src="<?php echo $project->getImagePath(); ?>" class="img-responsive" alt="Responsive image">
            <h2><?php echo $project->title; ?></h2>

            <p><?php echo $project->shortDescription; ?></p>

        </div>
    <?php } ?>
</div>
