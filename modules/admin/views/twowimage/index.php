<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel app\models\TWowImageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Twow Images';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="twow-image-index">

    <h1>Музей ВОВ<?php //= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить картинку в слайдер или текст', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <div class="WoWPage">

						<div class="WoWBaner">
						
						</div>
<div class="WoWTitle">		





	</div>	
<?php 

	$carusel=[];
foreach($model as $item)
{
	if($item['name']!=NULL)
	{
?>
<img style="max-width: 30%;" src="<?php echo $item['name']?>"/>
<p>
        <?php //= Html::a('Редактировать', ['update', 'id' => $item['id']], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $item['id']], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены? Картинка будет удалена безвозвратно!!!',
                'method' => 'post',
            ],
        ]) ?>
</p>
<?php
	}
}
?>
<div class="WoWSlider">

</div>					
<div class="WoWText">
<?php
foreach($model as $item_text){
	if($item_text['text']!=NULL)
	{
	echo nl2br($item_text['text']);
	?>
	<p>
        <?= Html::a('Редактировать', ['update', 'id' => $item_text['id']], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $item_text['id']], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены? Текст будет удален безвозвратно!!!',
                'method' => 'post',
            ],
        ]) ?>
</p>
	<?php
	}
}
?>
</div>


</div>
</div>
