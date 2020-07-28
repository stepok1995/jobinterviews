<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\tinymce\TinyMce;
use app\models\UploadFormMember;
use app\models\TTypePublication;
use kartik\file\FileInput;
/* @var $this yii\web\View */
/* @var $model app\models\TMemberDoneckLand */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tmember-doneck-land-form">

    <?php $form = ActiveForm::begin([
           'validateOnBlur'=>false,
        'enableAjaxValidation'=>false,
        'validateOnChange'=>false,
]);

	?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

      <?php	echo $form->field($model, 'text')->widget(TinyMce::className(), [
    'options' => ['rows' => 6],
    'language' => 'ru',
    'clientOptions' => [
        'plugins' => [
            'advlist autolink lists link charmap  print hr preview pagebreak',
            'searchreplace wordcount textcolor visualblocks visualchars code fullscreen nonbreaking',
            'save insertdatetime media table contextmenu template paste image'
        ],
        'toolbar' => 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image'
    ]
]); ?>

    <?= $form->field($model, 'type_id')->dropdownList( 
TTypePublication::find()->select(['name', 'id'])
->indexBy('id')->column(), 
['prompt'=>'Выберете источник','id'=>'source']) 
->label('Выбрать тип статьи');  ?>

		       <?php
    echo $form->field(new UploadFormMember, 'imageFiles[]')->widget(FileInput::classname(), [
		    'options' => ['multiple' => true, 'accept' => 'image/*'],
		]);
    ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
