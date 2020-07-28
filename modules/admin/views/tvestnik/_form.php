<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\tinymce\TinyMce;
use app\models\UploadFormVestnik;
use app\models\UploadFormVestnikFile;

/* @var $this yii\web\View */
/* @var $model app\models\TVestnik */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tvestnik-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

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

  <h2>Выбрать картинку (*.png, *.gif, *.jpg)</h2>
	 <?= $form->field(new UploadFormVestnik, 'imageFiles[]')->fileInput(['multiple' => true, 'accept' => 'images/*']) ?>
  <h2>Выбрать файл (*.pdf)</h2>
	 <?= $form->field(new UploadFormVestnikFile, 'imageFiles[]')->fileInput(['multiple' => true, 'accept' => 'images/*']) ?>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
