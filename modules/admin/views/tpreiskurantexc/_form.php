<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\TTypeExc;
/* @var $this yii\web\View */
/* @var $model app\models\TPreiskurantExc */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tpreiskurant-exc-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'type_ex_id')->dropdownList( 
TTypeExc::find()->select(['name', 'id'])
->indexBy('id')->column(), 
['prompt'=>'Выбрать категорию','id'=>'source']) 
->label('Выбрать категорию');  ?>

    <?= $form->field($model, 'cost')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
