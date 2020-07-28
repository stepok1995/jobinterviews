<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\UploadFormAM;
use kartik\file\FileInput;
/* @var $this yii\web\View */
/* @var $model app\models\TAfishaMonth */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tafisha-month-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php //= $form->field(new UploadFormAM, 'imageFiles[]')->fileInput(['multiple' => true, 'accept' => 'images/*']) ?>
	
	    <?php
    echo $form->field(new UploadFormAM, 'imageFiles[]')->widget(FileInput::classname(), [
		    'options' => ['multiple' => true, 'accept' => 'image/*'],
		]);
    ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
