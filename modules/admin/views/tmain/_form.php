<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\UploadFormMain;

/* @var $this yii\web\View */
/* @var $model app\models\TMainPage */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tmain-page-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'link')->textInput(['maxlength' => true]) ?>

	 <?= $form->field(new UploadFormMain, 'imageFiles[]')->fileInput(['multiple' => true, 'accept' => 'images/*']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
