<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\THistory;
/* @var $this yii\web\View */
/* @var $model app\models\THistoryImage */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="thistory-image-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'history_id')->dropdownList( 
THistory::find()->select(['date', 'id'])
->indexBy('id')->column(), 
['prompt'=>'Выбор даты','id'=>'source']) 
->label('Выбрать дату');  ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
