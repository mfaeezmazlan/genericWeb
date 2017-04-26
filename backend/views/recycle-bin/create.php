<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\RecycleBin */

$this->title = 'Create Recycle Bin';
$this->params['breadcrumbs'][] = ['label' => 'Recycle Bins', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="recycle-bin-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
