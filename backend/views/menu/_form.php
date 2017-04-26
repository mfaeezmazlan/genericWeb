<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Ref;
use app\models\Menu;
/* @var $this yii\web\View */
/* @var $model app\models\Menu */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="menu-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'menu_txt')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'menu_loc')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'menu_parent_id')->dropDownList(Menu::getMenuList('module'),['prompt'=>'-- Please Select --']) ?>

    <?= $form->field($model, 'module_ind')->textInput() ?>

    <?= $form->field($model, 'default_menu')->textInput() ?>

    <?= $form->field($model, 'target_win')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hide_ind')->textInput() ?>

    <?= $form->field($model, 'icon_name')->dropDownList(Ref::getList('icon'),['prompt'=>'-- Please Select --']) ?>

    <?= $form->field($model, 'sort')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>