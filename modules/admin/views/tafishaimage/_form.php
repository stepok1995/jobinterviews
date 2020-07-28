<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\TAfishaImage;
use app\models\TAfishaType;
use app\models\UploadFormAI;
use kartik\file\FileInput;
/* @var $this yii\web\View */
/* @var $model app\models\TAfishaImage */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tafisha-image-form">

<?php $form = ActiveForm::begin() ?>

    <?= $form->field($model, 'afisha_type_id')->dropdownList(
TAfishaType::find()->select(['name', 'id'])
->indexBy('id')->column(),
['prompt'=>'Выбрать категорию афиши','id'=>'source'])
->label('Выбрать категорию афиши');?>

    <?php
		echo $form->field(new UploadFormAI, 'imageFiles[]')->widget(FileInput::classname(), [
		    'options' => ['accept' => 'image/*'],
		]);
		 ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
