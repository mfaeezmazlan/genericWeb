<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RefSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'References';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page-header">
    <h1>
        <?= Html::encode($this->title) ?>
        <small>
            <i class="icon-double-angle-right"></i>
            A compilation of data dictionary used in this system where administrator can easily manage the data dictionary here.
        </small>
    </h1>
</div>
<div class="row">
    <div class="col-xs-12 col-md-12 col-lg-12">
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

        <p>
            <?= Html::a('Create Ref', ['create'], ['class' => 'btn btn-success']) ?>
        </p>
        <?=
        GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            // 'id',
            'cat',
            'code',
            [
            'attribute'=>'descr',
            'format'=>'raw',
            'value'=>function($model){
                return $model->descr;
            }
            ],
            // 'descr',
            'param1',
            // 'param2',
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