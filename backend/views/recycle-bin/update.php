<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\RecycleBin */

$this->title = 'Update Recycle Bin: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Recycle Bins', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="recycle-bin-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
