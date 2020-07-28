<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\tinymce\TinyMce;
use app\models\UploadFormHistory;
use kartik\file\FileInput;
use app\models\THistoryImage;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model app\models\THistory */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="thistory-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'date')->textInput(['maxlength' => true]) ?>

    <?php //= $form->field($model, 'text')->textarea(['rows' => 6]) 
	echo $form->field($model, 'text')->widget(TinyMce::className(), [
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
]);
	?>
	
	<?php   
	if(isset($history_image)==true)
	{
	//	echo'<pre>'.print_r($model_img,true).'</pre>';
			foreach($history_image as $item_history_image)
		{	
		?>
		<a href="<?php echo Url::to(['thistory/deleteimg', 'id' =>$item_history_image->id]); ?>">
		<?php
    echo Html::img($item_history_image->name, $options = ['style' => ['width' => '180px']]);
	?></a><?php
	}
	}
	?>
	
	       <?php
    echo $form->field(new UploadFormHistory, 'imageFiles[]')->widget(FileInput::classname(), [
		    'options' => ['multiple' => true, 'accept' => 'image/*'],
		]);
    ?>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
