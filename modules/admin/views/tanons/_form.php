<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
//use kartik\date\DatePicker;
use dosamigos\tinymce\TinyMce;
use app\models\UploadFormAnons;
use app\models\UploadAnonsPreview;
use app\models\TAnons;
use yii\bootstrap\Modal;
//use kartikile\FileInput;
use kartik\file\FileInput;
/* @var $this yii\web\View */
/* @var $model app\models\TAnons */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="taction-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

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

    <?php echo $form->field($model, 'text_preview')->widget(TinyMce::className(), [
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
<?php

	if(isset($model_img_preview)==true)
	{
	//	echo'<pre>'.print_r($model_img,true).'</pre>';
	//		foreach($model_img_preview as $item_img_preview)
	//	{	
    echo Html::img($model_img_preview->img_preview, $options = ['style' => ['width' => '180px']]);
//	}
	}
?>
<h3>Поместите картинку-превью на форму ниже:</h3>
<?php
	$mod_upl_preview=new UploadAnonsPreview;
echo $form->field($mod_upl_preview, 'imageFiles[]')->widget(FileInput::classname(), [
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
?>
<?php 

	if(isset($model_img)==true)
	{
	//	echo'<pre>'.print_r($model_img,true).'</pre>';
			foreach($model_img as $item_img)
		{	
    echo Html::img($item_img->name, $options = ['style' => ['width' => '180px']]);
	}
	}
 ?>
 <h3>Разместите фото которые необходимо добавить к записи:</h3>
    <?php

	$mod_upl=new UploadFormAnons;
	echo $form->field($mod_upl, 'imageFiles[]')->widget(FileInput::classname(), [
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
    ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
