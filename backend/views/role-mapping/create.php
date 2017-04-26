<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\RoleMapping */

$this->title = 'Create Role Mapping';
$this->params['breadcrumbs'][] = ['label' => 'Role Mappings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="role-mapping-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
