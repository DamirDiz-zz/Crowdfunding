<?php
/* @var $this yii\web\View */

$this->title = $project->title;

if ($initiator) {
    $username = $initiator->firstname . ' ' . $initiator->lastname;  
    $initiatoravatar = $initiator->getImagePath();
}

?>

<section class="herodetail">
    <div class="herodetail-content">
        <div class="herodetail-content-holder text-center">
             <h1><?php echo $project->title; ?></h1>
             <h2><?php echo $project->location; ?></h2>
             <?php if($initiator) { ?>
             <div class="herodetail-people">
                 <img class="user-avatar" src="<?php echo "../" . $initiatoravatar ?>" alt="<?php echo $username; ?>">
                 <p class="username"><?php echo $username; ?></p>
                 <p class="role">Initiator</p>
             </div>
             <?php } ?>
        </div>
    </div>
    <div class="herodetail-image" style="background-image: url(<?php echo "../" . $project->getImagePath() ?>);"></div>
</section>
