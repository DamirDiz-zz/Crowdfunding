<?php
/* @var $this yii\web\View */

use app\models\ProjectDescription;

$this->registerJsFile('@web/js/project.js', ['position' => \yii\web\View::POS_END, 'depends' => [\yii\web\JqueryAsset::className()]]);

$this->title = $project->title;

if ($initiator) {
    $username = $initiator->firstname . ' ' . $initiator->lastname;
    $initiatoravatar = $initiator->getImagePath();
}
?>

<section id="project" data-project-id="<?php echo $project->id; ?>" data-project-new="<?php echo (int) $projectIsNew; ?>">
    <section class="herodetail">
        <div class="herodetail-content">
            <div class="herodetail-content-holder text-center">
                <h1><?php echo $project->title; ?></h1>
                <h2><?php echo $project->location; ?></h2>
                <?php if ($initiator) { ?>
                    <div class="herodetail-people">
                        <img class="user-avatar" src="<?php echo $initiatoravatar ?>" alt="<?php echo $username; ?>">
                        <p class="username"><?php echo $username; ?></p>
                        <p class="role">Initiator</p>
                    </div>
                    <div class="center-block"><a href="#" class="btn btn-fill btn-medium">Ich will mitmachen!</a></div>
                <?php } ?>
            </div>
        </div>
        <div class="herodetail-image" style="background-image: url(<?php echo $project->getImagePath() ?>);"></div>
    </section>
    <section class="full-width-map">
        <div id="map" lat="<?php echo $project->latitude; ?>" lng="<?php echo $project->longitude; ?>" location="<?php echo $project->location; ?>" style="height:200px; width:100%"></div>
    </section>

    <section class="project-nav">
        <ul>
            <div class="project-nav-item">Über dieses Projekt</div>
            <div class="project-nav-item">Updates</div>
            <div class="project-nav-item">Aufgaben</div>
        </ul>
    </section>
    
    <section class="project-detail-description">

        <p class="descriptionElement"><?php echo $project->shortDescription; ?></p>
        <figure class="descriptionElement">
            <div class="imageHolder"><img src="<?php echo $project->getImagePath() ?>"></div>
            <figcaption class="imageCaption"><?php echo $project->title; ?></figcaption>
        </figure>

        <?php if (count($projectDescriptions) > 0) { ?>
        <?php foreach ($projectDescriptions as $pd) {
            if ($pd->type == ProjectDescription::TEXT) { ?>
                <p class="descriptionElement"><?php echo $pd->value; ?></p>

            <?php } else if ($pd->type == ProjectDescription::IMAGE) { ?>
                <figure class="descriptionElement">
                    <div class="imageHolder"><img src="<?php echo Yii::getAlias('@web') . '/uploads/' . $pd->value ?>"></div>
                    <figcaption class="imageCaption"><?php echo $pd->description ?></figcaption>
                </figure>
            <?php } else if ($pd->type == ProjectDescription::URL) { ?>


        <?php }}} ?>

    </section>
</section>

<div id="project-created-modal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Glückwunsch!</h4>
                <h3 class="modal-subtitle">Dein Projekt wurde angelegt. </h3>
            </div>
            <div class="modal-body">
                <p class="centered-modal-text">Kennst du Leute die mitmachen möchten? <br> Dann teile dein Projekt mit Ihnen.</p>
                <div class="row">
                    <div class="col-md-4 social-icon-large"><img src="../img/icontwitter.png"></div>
                    <div class="col-md-4 social-icon-large"><img src="../img/iconfacebook.png"></div>
                    <div class="col-md-4 social-icon-large"><img src="../img/iconmail.png"></div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <input class="reference-link" type="text" name="link" value="<?php echo Yii::$app->request->absoluteUrl; ?>">                    
                    </div>
                </div>
                <p class="centered-modal-text">Lade hier das Flugblatt zu deinem Projekt runter.<br> Druck es aus und hänge es in deiner Nachbarschaft auf.</p>
                <div class="row">
                    <div class="col-md-4 social-icon-large"></div>
                    <div class="col-md-4 social-icon-large"><img src="../img/iconmonstr-note-14-icon-256.png"></div>
                    <div class="col-md-4 social-icon-large"></div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">weiter zum Projekt</button>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
