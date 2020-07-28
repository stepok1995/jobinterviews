<?php

use yii\helpers\Html;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel app\models\TWowImageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Twow';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="twow-image-index">

    <h1>Редактировать текст<?php //= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить текст', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

<div class="WoWPage">

						<div class="WoWBaner">
						<img style="width: 100%" src="/images/Filial/VOV.jpg" alt="" />
						</div>
<div class="WoWTitle">		




<h1> Донецкий военно-исторический музей Великой Отечественной войны</h1>
	</div>	
<?php 

	$carusel=[];
foreach($model as $item)
{
	$carusel[]=

					[
					'content' => '<img src="'.$item['name'].'"/>',
					'options' => []
					];
}
?>
<div class="WoWSlider">
<?php
echo Carousel::widget([
        'items' => $carusel,
		'options' => ['class' => 'carousel slide', 'data-interval' => '12000'],
    ]);
?>
<p>
        <?= Html::a('Редактировать содержание слайдера', ['admin/twowimage'], ['class' => 'btn btn-primary']) ?>
</p>
</div>					
<div class="WoWText">

<p>
        <?= Html::a('Редактировать текст', ['update', 'id' => $item_text['id']], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $item_tetx['id']], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены? Запись будет удалена безвозвратно!!!',
                'method' => 'post',
            ],
        ]) ?>
</p>
<?php
foreach($model_text as $item_tetx){
	echo nl2br($item_tetx['text']);
}
?>
</div>


</div>
</div>
