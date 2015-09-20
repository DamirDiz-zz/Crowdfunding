<?php
/* @var $this yii\web\View */

$this->registerJsFile('@web/js/project.js', ['position' => \yii\web\View::POS_END, 'depends' => [\yii\web\JqueryAsset::className()]]);

$this->title = $project->title;

if ($initiator) {
    $username = $initiator->firstname . ' ' . $initiator->lastname;  
    $initiatoravatar = $initiator->getImagePath();
}
?>
<sectiom id="project" project-id="<?php echo $project->id; ?>" project-new="<?php echo (int)$projectIsNew; ?>">
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
             <div class="center-block"><a href="#" class="btn-fill btn-medium">Ich will mitmachen!</a></div>
             <?php } ?>
        </div>
    </div>
    <div class="herodetail-image" style="background-image: url(<?php echo "../" . $project->getImagePath() ?>);"></div>
</section>
<section class="full-width-map">
<div id="map" lat="<?php echo $project->latitude; ?>" lng="<?php echo $project->longitude; ?>" location="<?php echo $project->location; ?>" style="height:200px; width:100%"></div>
</section>

<section class="project-detail-description row">
    <div class="project-detail-description-image col-md-4"><img src="<?php echo "../" . $project->getImagePath() ?>"></div>
    <div class="project-detail-description-text col-md-8"><?php echo $project->shortDescription; ?></div>
</section>

<section class="row">
    <div class="project-detail-description-text"><?php echo $project->shortDescription; ?></div>
</section>
</sectio>

<div id="project-created-modal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Glückwunsch!</h4>
        <h3 class="modal-subtitle">Dein Projekt wurde angelegt. </h3>
      </div>
      <div class="modal-body">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">weiter zum Projekt</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
