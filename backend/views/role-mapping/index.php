<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Ref;
use app\models\Menu;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RoleMappingSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Role Mappings';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page-header">
    <h1>
        <?= Html::encode($this->title) ?>
        <small>
            <i class="icon-double-angle-right"></i>
            Mapping type of user will get what kind of accessibality depend of the role of the user.
        </small>
    </h1>
</div>
<div class="row">
    <div class="col-xs-12 col-md-12 col-lg-12">
        <?php // echo $this->render('_search', ['model' => $searchModel]);  ?>

        <p>
            <?= Html::a('Create Role Mapping', ['create'], ['class' => 'btn btn-success']) ?>
        </p>
        <?=
        GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
//            'id',
//            'role_code',
            [
            'attribute' => 'role_code',
            'format' => 'raw',
            'filter'=>Ref::getList('role'),
            'value' => function($model) {
                return Ref::getDesc('role', $model->role_code);
            }
            ],
//            'menu_id',
            [
            'attribute' => 'menu_id',
            'format' => 'raw',
            'filter'=>Menu::getMenuList('module'),
            'value' => function($model) {
                return Menu::getMenuDescr($model->menu_id);
            }
            ],
            'isDeleted',
            'created_at',
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