<?php
/* @var $this yii\web\View */

$this->title = 'Crowdfunding';
?>

<section class="hero">
    <div class="hero-content">
        <div class="hero-content-holder text-center">
            <h1>Mach deine Stadt grüner!</h1>
            <p class="intro">Wir helfen dir ökologische, nachhaltige und grüne Projekte in deiner Nachbarschaft umzusetzen</p>
            <div class="hero-content-how-it-works">
                <div class="row">
                    <div class="col-md-4 intro-feature">
                        <div>
                            <div class="intro_step step-one center-block"></div>
                            <h5>Teile deine Idee</h5>
                            <p>Lege ein Projekt und wir helfen dir dabei es bekannt zu machen.</p>
                        </div>
                    </div>
                    <div class="col-md-4 intro-feature">
                        <div>
                            <div class="intro_step step-two center-block"></div>
                            <h5>Hol dir unterstützung</h5>
                            <p>Finde Leute die dir bei der Umsetzung helfen möchten und lernt euch kennen.
                        </div>
                    </div>
                    <div class="col-md-4 intro-feature">
                        <div>
                            <div class="intro_step step-three center-block"></div>
                            <h5>Setze es um</h5>
                            <p>Setzt euch Ziele und verwirklicht euer Projekt.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="hero-image"></div>
</section>

<section class="main-section">
    <div class="container-elements clearfix">
        <div class="pull-left"><h3>Beliebte Projekte</h3></div>
        <div class="pull-right"><a href="#" class="btn btn-medium">Alle Projekte</a></div>
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
                    <div class="project-box-body-description"><?php echo $project->shortDescription; ?></div>
                </div>
            </div>
        <?php } ?>
    </div>
</section>
