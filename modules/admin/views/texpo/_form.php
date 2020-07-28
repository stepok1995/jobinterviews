<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\tinymce\TinyMce;
use app\models\TFloor;
use app\models\UploadForm;
use kartik\file\FileInput;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model app\models\TExpo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="texpo-form">

    <?php $form = ActiveForm::begin(); ?>

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

    <?= $form->field($model, 'floor_id')->dropdownList( 
TFloor::find()->select(['name', 'id'])
->indexBy('id')->column(), 
['prompt'=>'Выбрать этаж','id'=>'source']) 
->label('Выбрать этаж');  ?>

	<?php   
	if(isset($expo_image)==true)
	{
	//	echo'<pre>'.print_r($model_img,true).'</pre>';
			foreach($expo_image as $item_expo_image)
		{	
		?>
		<a href="<?php echo Url::to(['texpo/deleteimg', 'id' =>$item_expo_image->id]); ?>">
		<?php
    echo Html::img($item_expo_image->name, $options = ['style' => ['width' => '180px']]);
	?></a><?php
	}
	}
	?>
   <?php
    echo $form->field(new UploadForm, 'imageFiles[]')->widget(FileInput::classname(), [
		    'options' => ['multiple' => true, 'accept' => 'image/*'],
		]);
    ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
