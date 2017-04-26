<?php
/* @var $this \yii\web\View */
/* @var $content string */

//use backend\assets\AppAsset;
use yii\helpers\Html;

//use yii\bootstrap\Nav;
//use yii\bootstrap\NavBar;
//use yii\widgets\Breadcrumbs;
//use common\widgets\Alert;
//AppAsset::register($this);
$asset = backend\assets\AppAsset::register($this);
$baseUrl = $asset->baseUrl;
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>

    </head>
    <body>
        <?php $this->beginBody() ?>


        <div id="wrapper">

            <!-- Navigation -->
            <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php">WebGeneric</a>
                </div>
                <!-- /.navbar-header -->

                <?php
                if (!Yii::$app->user->isGuest)
                    include('top_navigation.php');
                ?>
                <!-- /.navbar-top-links -->

                <?php
                if (!Yii::$app->user->isGuest)
                    include('side_navigation.php');
                ?>
                <!-- /.navbar-static-side -->
            </nav>
            <?php
            if (!Yii::$app->user->isGuest) {
                ?>
                <div id="page-wrapper">
                    <div class="row">
                        <?= $content; ?>
                    </div>
                </div>
                <?php
            } else {
                ?>
                <div class="container">
                    <div class="row">
                        <?= $content; ?>
                    </div>
                </div>
                <?php
            }
            ?>
            <!-- /#page-wrapper -->

        </div>

        <?php
        if (!Yii::$app->user->isGuest) {
            ?>
            <footer class="footer">
                <div class="container">
                    <p class="pull-right">&copy; WebGen <?php echo date('Y') ?></p>

                         <!--<p class="pull-right"><?php // echo Yii::powered()                       ?></p>-->
                </div>
            </footer>
            <?php
        }
        ?>

        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
