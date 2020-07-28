<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\TFloor;
use app\models\UploadFormFloorImage;
/* @var $this yii\web\View */
/* @var $model app\models\TFloorImage */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tfloor-image-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field(new UploadFormFloorImage, 'imageFiles[]')->fileInput(['multiple' => true, 'accept' => 'images/*']) ?>

    <?= $form->field($model, 'floor_id')->dropdownList( 
TFloor::find()->select(['name', 'id'])
->indexBy('id')->column(), 
['prompt'=>'Выбрать этаж','id'=>'source']) 
->label('Выбрать этаж');  ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
