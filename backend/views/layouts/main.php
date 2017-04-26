<?php
/* @var $this \yii\web\View */
/* @var $content string */

//use backend\assets\AppAsset;
use yii\helpers\Html;

//use yii\bootstrap\Nav;
//use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
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
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <?php
    if (!Yii::$app->user->isGuest) {
        ?>
        <body>
            <?php
        }
        else{
            ?>
        <body class="login-layout">
            <?php
        }
        ?>
        <?php $this->beginBody() ?>

        <div id='deleteModal' class='modal fade' role='dialog'>
            <div class='modal-dialog'>
                <div class='modal-content'>
                    <div class='modal-header'>
                        <button type='button' class='close' data-dismiss='modal'>&times;</button>
                        <h4 class='modal-title' id='modal-title'></h4>
                    </div>
                    <div class='modal-body' id='modal-body'></div>
                    <div class='modal-footer'>
                        <button id="cancelDelete" type='button' class='btn btn-danger' data-dismiss='modal'><span class="icon-ca"></span> Cancel</button>
                        <button id="confirmDelete" type='button' class='btn btn-success' data-dismiss='modal'><span class="icon-check"></span> Confirm</button>
                    </div>
                </div>
            </div>
        </div>

        <?php
        if (!Yii::$app->user->isGuest)
            include("top_navigation.php");
        ?>

        <?php
        if (!Yii::$app->user->isGuest) {
            ?>
            <div class="main-container" id="main-container">
                <script type="text/javascript">
                    try {
                        ace.settings.check('main-container', 'fixed');
                    } catch (e) {
                    }
                </script>

                <div class="main-container-inner">
                    <a class="menu-toggler" id="menu-toggler" href="#">
                        <span class="menu-text"></span>
                    </a>

                    <?php
                    include("side_navigation.php");
                    ?>

                    <div class="main-content">
                        <div class="breadcrumbs" id="breadcrumbs">
                            <script type="text/javascript">
                                try {
                                    ace.settings.check('breadcrumbs', 'fixed');
                                } catch (e) {
                                }
                            </script>

                            <?php
                            echo Breadcrumbs::widget([
                                'homeLink' => [
                                    'label'=>'<i class="icon-home icon-large"></i>'." ".Yii::t('yii', 'Home'),
                                    'url'=>Yii::$app->homeUrl,
                                    'encode'=>false,
                                ],
                                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : ['label'=>Yii::t('yii', 'Dashboard')],
                            ]);
                            ?>

                            <div class="nav-search" id="nav-search">
                                <form class="form-search">
                                    <span class="input-icon">
                                        <input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
                                        <i class="icon-search nav-search-icon"></i>
                                    </span>
                                </form>
                            </div><!-- #nav-search -->
                        </div>

                        <div class="page-content">
                            <?= $content; ?>
                        </div><!-- /.page-content -->
                    </div><!-- /.main-content -->

                    <div class="ace-settings-container" id="ace-settings-container">
                        <div class="btn btn-app btn-xs btn-warning ace-settings-btn" id="ace-settings-btn">
                            <i class="icon-cog bigger-150"></i>
                        </div>

                        <div class="ace-settings-box" id="ace-settings-box">
                            <div>
                                <div class="pull-left">
                                    <select id="skin-colorpicker" class="hide">
                                        <option data-skin="default" value="#438EB9">#438EB9</option>
                                        <option data-skin="skin-1" value="#222A2D">#222A2D</option>
                                        <option data-skin="skin-2" value="#C6487E">#C6487E</option>
                                        <option data-skin="skin-3" value="#D0D0D0">#D0D0D0</option>
                                    </select>
                                </div>
                                <span>&nbsp; Choose Skin</span>
                            </div>

                            <div>
                                <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-navbar" />
                                <label class="lbl" for="ace-settings-navbar"> Fixed Navbar</label>
                            </div>

                            <div>
                                <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-sidebar" />
                                <label class="lbl" for="ace-settings-sidebar"> Fixed Sidebar</label>
                            </div>

                            <div>
                                <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-breadcrumbs" />
                                <label class="lbl" for="ace-settings-breadcrumbs"> Fixed Breadcrumbs</label>
                            </div>

                            <div>
                                <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-rtl" />
                                <label class="lbl" for="ace-settings-rtl"> Right To Left (rtl)</label>
                            </div>

                            <div>
                                <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-add-container" />
                                <label class="lbl" for="ace-settings-add-container">
                                    Inside
                                    <b>.container</b>
                                </label>
                            </div>
                        </div>
                    </div><!-- /#ace-settings-container -->
                </div><!-- /.main-container-inner -->

                <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
                    <i class="icon-double-angle-up icon-only bigger-110"></i>
                </a>
            </div><!-- /.main-container -->
            <?php
        } else {
            echo $content;
        }
        ?>
        <!-- basic scripts -->

        <!--[if !IE]> -->

        <script type="text/javascript">
            window.jQuery || document.write("<script src='../../vendor/bower/ace-admin-v9/assets/js/jquery-2.0.3.min.js'>" + "<" + "/script>");
        </script>

        <script type="text/javascript">
            if ("ontouchend" in document)
                document.write("<script src='../../vendor/bower/ace-admin-v9/assets/js/jquery.mobile.custom.min.js'>" + "<" + "/script>");
        </script>

        <?php $this->endBody() ?>


    </body>
</html>
<?php $this->endPage() ?>
