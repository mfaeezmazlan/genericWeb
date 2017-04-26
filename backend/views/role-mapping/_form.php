<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Ref;
use app\models\Menu;

/* @var $this yii\web\View */
/* @var $model app\models\RoleMapping */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="role-mapping-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'role_code')->dropDownList(Ref::getList('role'), ['prompt' => "-- Please Select --"]) ?>

    <?= $form->field($model, 'menu_id')->dropDownList(Menu::getMenuList("module"), ['prompt' => "-- Please Select --"]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
