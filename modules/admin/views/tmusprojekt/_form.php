<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\tinymce\TinyMce;
use app\models\UploadFormProjekt;
use app\models\TMusProjektType;
use yii\helpers\Url;
use kartik\file\FileInput;
/* @var $this yii\web\View */
/* @var $model app\models\TMusProjekt */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tmus-projekt-form">

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'project_type')->dropdownList( 
TMusProjektType::find()->select(['name', 'id'])
->indexBy('id')->column(), 
['prompt'=>'Выберете источник','id'=>'source']) 
->label('Выбрать категорию');?>
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?php //= $form->field($model, 'text')->textarea(['rows' => 6]) 
	echo $form->field($model, 'text')->widget(TinyMce::className(), [
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
]);
	?>


<?php 

	if(isset($model_img)==true)
	{
	//	echo'<pre>'.print_r($model_img,true).'</pre>';
			foreach($model_img as $item_img)
		{	
		?>
		<a href="<?php echo Url::to(['tmusprojekt/deleteimg', 'id' =>$item_img->id]); ?>">
		<?php
    echo Html::img($item_img->name, $options = ['style' => ['width' => '180px']]);
	?></a><?php
	}
	}
 ?>
 <h3>Разместите фото которые необходимо добавить к записи:</h3>
    <?php

	$model=new UploadFormProjekt;
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
