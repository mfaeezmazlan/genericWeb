<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Menu;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MenuSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Menus';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page-header">
    <h1>
        <?= Html::encode($this->title) ?>
        <small>
            <i class="icon-double-angle-right"></i>
            overview &amp; stats
        </small>
    </h1>
</div>
<div class="row">
    <div class="col-xs-12 col-md-12 col-lg-12">
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

        <p>
            <?= Html::a('Create Menu', ['create'], ['class' => 'btn btn-success']) ?>
        </p>
        <?=
        GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
//            'id',
                'menu_txt',
                'menu_loc',
//            'menu_parent_id',
                [
                    'attribute' => 'menu_parent_id',
                    'format' => 'raw',
                    'filter' => Menu::getMenuList('module'),
                    'value' => function($model) {
                        return Menu::getMenuDescr($model->menu_parent_id);
                    }
                ],
                'module_ind',
                // 'default_menu',
                // 'target_win',
                // 'hide_ind',
                // 'icon_name',
                // 'sort',
                // 'isDeleted',
                // 'created_at',
                // 'created_by',
                // 'updated_at',
                // 'updated_by',
                // 'deleted_at',
                // 'deleted_by',
                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]);
        ?>
    </div>
</div>