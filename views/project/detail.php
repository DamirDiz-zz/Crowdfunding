<?php
/* @var $this yii\web\View */

$this->title = $project->title;
?>

<section class="herodetail">
    <div class="herodetail-content">
        <div class="herodetail-content-holder text-center">
             <h1><?php echo $project->title; ?></h1>
             <h2><?php echo $project->location; ?></h2>
        </div>
    </div>
    <div class="herodetail-image" style="background-image: url(<?php echo "../" . $project->getImagePath() ?>);"></div>
</section>
