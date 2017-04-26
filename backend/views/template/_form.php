<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Ref;

/* @var $this yii\web\View */
/* @var $model app\models\Template */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="template-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'template_content')->textarea(['rows' => 6,'class'=>'']) ?>

    <?= $form->field($model, 'status')->dropDownList(Ref::getList('activeStatus'),['prompt' => "-- Please Select --"]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<script src=" ../../vendor/bower/ace-admin-v9/ckeditor/ckeditor.js"></script>
<script>
	CKEDITOR.replace('template-template_content');
</script>