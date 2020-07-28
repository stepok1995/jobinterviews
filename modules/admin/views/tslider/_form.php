<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\UploadFormSlider;
use kartik\file\FileInput;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model app\models\TSlider */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tslider-form">

    <?php $form = ActiveForm::begin(); ?>

        <?php
		echo $form->field(new UploadFormSlider, 'imageFiles[]')->widget(FileInput::classname(), [
 'name' => 'imageFiles[]',
 'language' => 'ru',
 'options' => [//'multiple' => true, 
 'pluginOptions' => [
 'showUpload'=>true,
 'previewFileType' => 'any',
 'uploadUrl ' => Url:: to (['/site/file-upload'])
]
]
    ]);
		//= $form->field(new UploadFormSlider, 'imageFiles[]')->fileInput(['multiple' => false, 'accept' => 'images/*']) ?>

		
		
		
		
		<h3>Введите заголовок новости:</h3>
		    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
		<h3>На какую новость будет вести ссылка:</h3>	
			    <?= $form->field($model, 'link')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
