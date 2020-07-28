<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use yii\web\UploadedFile;
//use kartik\widgets\ActiveForm;
use kartik\datetime\DateTimePicker;
use dosamigos\tinymce\TinyMce;
use app\models\UploadFormAction;
use app\models\UploadActionPreview;
use app\models\TAction;
use app\models\TActionClass;
use yii\bootstrap\Modal;
//use kartikile\FileInput;
use kartik\file\FileInput;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $model app\models\TAction */
/* @var $form yii\widgets\ActiveForm */
?>
<?php Pjax::begin(); 

?>
<div class="taction-form">

    <?php 
	//public $per=[];
	$form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'date')->textInput([ 'id'=>'date']) ?>
<?php $this->registerJs('
$("#datePicker").change(function(){
$("#date").val($("#datePicker").val());
});

',\yii\web\View::POS_LOAD)?>
<?=DatePicker::widget([
'id'=> 'datePicker',
'name' => 'check_issue_date',
'value' => date('Y-m-d'),
'options' => ['placeholder' => 'Select issue date ...'],
'pluginOptions' => [
'format' => 'yyyy-mm-dd',
'todayHighlight' => true
]
]); ?>

<h3>Выберите дату и время когда публиковать запись:</h3>
    <?php //= $form->field($model, 'datetime')->textInput([ 'id'=>'datetime']) ?>
<?php echo $form->field($model, 'datetime')->widget(DateTimePicker::classname(), [
	'pluginOptions' => [
		'autoclose' => true
	]
]);?>


<?= $form->field($model, 'class_id')->dropdownList( 
TActionClass::find()->select(['name', 'id'])
->indexBy('id')->column(), 
['prompt'=>'','id'=>'source']) 
->label('Запись какого класса хотите добавить?');  ?>
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
	$mod_upl_preview=new UploadActionPreview;
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
		?>
		<a href="<?php echo Url::to(['taction/deleteimg', 'id' =>$item_img->id]); ?>">
		<?php
    echo Html::img($item_img->name, $options = ['style' => ['width' => '180px']]);
	?></a><?php
	}
	}
 ?>
 <h3>Разместите фото которые необходимо добавить к записи:</h3>
    <?php

	$mod_upl=new UploadFormAction;
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

// echo FileInput::widget([
    // 'name' => 'imageFiles[]',
    // 'language' => 'ru',
    // 'options' => ['multiple' => true],
    // 'pluginOptions' => ['previewFileType' => 'any', 'uploadUrl' => UploadedFile::getInstances($mod_upl, 'imageFiles[]'),]
// ]);

//$mod_upl->imageFiles[] = UploadedFile::getInstances($mod_upl, 'imageFiles[]');
    ?>

	
 <h3>Подгружать событие в топ? </h3>
<?php 
   echo $form->field($model, 'topnews')->checkbox(array('value'=>1, 'uncheckValue'=>0)) ;
 ?>
 <?php 
 // $per=TAction::find()
// ->all();
// foreach($per as $per_one)
// {
 // if($per_one['class_id']==3 or $per_one['class_id']==1)
 // {
 ?>
  <h3>Переместить событие в архив? </h3>
<?php 
   echo $form->field($model, 'arhive')->checkbox(array('value'=>1, 'uncheckValue'=>0)) ;
 // }
// }
 ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php
 Pjax::end(); ?>