<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\UploadFormWowFile;
use dosamigos\tinymce\TinyMce;
use kartik\file\FileInput;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model app\models\TWowImage */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="twow-image-form">

    <?php $form = ActiveForm::begin(); ?>

          

		       <?php echo $form->field($model, 'text')->widget(TinyMce::className(), [
    'options' => ['rows' => 30],
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
		   
		 <?php

	$model=new UploadFormWowFile;
echo $form->field($model, 'imageFiles[]')->widget(FileInput::classname(), [
 'name' => 'imageFiles[]',
 'language' => 'ru',
 'options' => ['multiple' => true, 
 'pluginOptions' => [
 'showUpload'=>true,
 'previewFileType' => 'any',
 'uploadUrl ' => Url:: to (['/site/file-upload'])
]
]
    ]);

// echo FileInput::widget([
    // 'name' => 'imageFiles[]',
    // 'language' => 'ru',
    // 'options' => ['multiple' => true],
    // 'pluginOptions' => ['previewFileType' => 'any', 'uploadUrl' => UploadedFile::getInstances($mod_upl, 'imageFiles[]'),]
// ]);

//$mod_upl->imageFiles[] = UploadedFile::getInstances($mod_upl, 'imageFiles[]');
    ?>   
		   
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
