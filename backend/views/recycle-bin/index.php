<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Menu;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RecycleBinSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Recycle Bins';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page-header">
    <h1>
        <?= Html::encode($this->title) ?>
        <small>
            <i class="icon-double-angle-right"></i>
            All deleted file is placed here waiting to be deleted permanently from system.
        </small>
    </h1>
</div>
<div class="row">
    <div class="col-xs-12 col-md-12 col-lg-12">
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

        <p>
            <?= Html::a('Refresh list of tables', ['create'], ['class' => 'btn btn-success']) ?>
        </p>
        <?=
        GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                // 'id',
                'table_name',
                // 'trash_count',
                [
                    'attribute'=>'trash_count',
                    'format'=>'raw',
                    'filter'=>false,
                    'value'=>function($model){
                        $data = Menu::find("isDeleted='0'")->all();
                        return count($data);
                    }
                ],
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