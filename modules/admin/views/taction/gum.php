<?php

// use yii\helpers\Html;
// use yii\grid\GridView;
// use yii\helpers\Url;
// use app\models\TActionClass;
// use app\models\TAction;

// namespace app\model;
// use Yii;
// use yii\widgets\ActiveForm;
use yii\helpers\Html;
use app\models\TAction;
use app\models\TActionClass;
use app\models\TActionImage;
use yii\bootstrap\Carousel;
use yii\widgets\LinkPager;
// use kartik\date\DatePicker;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TActionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tactions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div  style="max-width: 90% !important;" class="taction-index">

    <h1>Гуманитарная программа:</h1>

    <p>
        <?= Html::a('Создать событие', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

<div class="newsPagemain">
<div class="banner">
<!--<img src="/images/top/top2.jpg" alt="" />-->
</div>
<div class="picker">

</div>
<?php
$i=0;
$monthes=[
1=>'Января', 2=>'Февраля', 3=>'Марта', 4=>'Апреля', 5=>'Мая', 6=>'Июня',
7=>'Июля', 8=>'Августа', 9=>'Сентября', 10=>'Октября', 11=>'Ноября', 12=>'Декабря',
];
?>
<div class="content">
<?php 
	$serv_time=date_default_timezone_set('Russia/Moscow');
				$today_date=date('Y-m-d H:i:s');
foreach($model as $item)
{
	$i=$i+1;
?>

<?php/*
if($i!=0 && $i!=1)
{*/
?><!--<hr />--><?php
//}
?>

<?php 
$date_wordsper = strtotime($item['date']);
$date_words = date('j ', $date_wordsper).$monthes[date('n', $date_wordsper)].date('  Y', $date_wordsper);
?>

<?php
		$model_image=TActionImage::find()
				->where(['action_id'=>$item['id']])
		->one();
?>

<div class="newsPage">
<div class="photo">
	<a href="<?php echo Url::to(['taction/item-actions', 'id' =>$item['id']]); ?>">
				
						<img src="<?= $item['img_preview'];?>">
				
	</a>
</div>
<div class="title">
	<a href="<?php echo Url::to(['taction/item-actions', 'id' =>$item['id']]); ?>">
		
				<h2><?php echo $item['title'];?></h2>
		
	</a>
</div>
	<?php if($date_words!=null){ ?>
<div class="dateNews">	

						<span><?php echo $date_words;?></span>
						
</div>	
	<?php } ?>			
<div class="description">			
				<?php 
				echo nl2br($item['text_preview'])?>
</div>			
</div>
<?php
if($item['topnews']==1)
{
	?><h2>Запись находится в топе!</h2><?php
}	
if($item['datetime']!='0000-00-00 00:00:00')
{
	?><h2><?php echo $item['datetime'];?></h2><?php
}
?>
<h2><?php 
// $per=TActionClass::find()->all();
// foreach($per as $per_item)
// {
	// if($per_item['id']==$item['class_id'])
	// {
		// echo $per_item['name'];
	// }
// }
?></h2>
<p>
        <?= Html::a('Редактировать', ['update', 'id' => $item['id']], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $item['id']], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены? Запись будет удалена безвозвратно!!!',
                'method' => 'post',
            ],
        ]) ?>
</p>
<hr />

<?php
}
?>
</div>
<div class="pager">
<?= LinkPager::widget(['pagination'=>$pagination])?>
</div>
</div>		
     <?php //= GridView::widget([
        // 'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        // 'columns' => [
            // ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            // 'date',
            // 'title',
            // 'text:ntext',
			// 'text_preview:ntext',
			            // [
    // 'label' => 'Превью',
    // 'format' => 'raw',
    // 'value' => function($data){
        // return Html::img(Url::toRoute($data->img_preview),[
            // 'alt'=>'yii2 - картинка в gridview',
            // 'style' => 'width:100px;'
        // ]);
    // },
// ],
// 'tActionClass.name',


            // ['class' => 'yii\grid\ActionColumn'],
        // ],
    // ]); ?>
</div>
