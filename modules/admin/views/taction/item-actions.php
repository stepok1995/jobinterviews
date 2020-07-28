<?php
namespace app\model;
use Yii;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use app\models\TAction;
use app\models\TActionImage;
use yii\bootstrap\Carousel;
use yii\bootstrap\Modal;
use kartik\date\DatePicker;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;
use app\components\FBFWidget;
use yii\helpers\Url;
?>



<!--<img style="width: 100%" src="/images/top/top2.jpg" alt="" />-->
<div style="width: 80%; margin: 0 auto;">
<?php
	$link = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; //получаем URL
	$id=parse_url($link); //распарсиваем ссылку на части
	$id_news=$id['query']; //получаем id события
	$id_news_id=substr($id_news, 3);
	$id_news_int=(int) $id_news_id;
?>

<h2><?php echo $model['title'];?></h2>
<?php
$carusel=[];$i=0;$nol=0;
foreach($model_image as $item_image){	if($item_image['name']!= NULL){	$i=$i+1;
			$carusel[]=
					[
					'content' => '<a href="#" data-toggle="modal" data-target="#myModal"><img src="'.$item_image['name'].'"/></a>',
					'options' => []
					];}else{	$nol=$nol+1;}
}
?>

<div>
<!--<a href="#" data-toggle="modal" data-target="#myModal">Во весь экран</a>-->
<div class="row" style="width: 30%; float:left; margin: 7px 7px 7px 0;">
    <?php 	if($i != $nol)	{	echo Carousel::widget([
        'items' => $carusel,
		'options' => ['class' => 'carousel slide', 'data-interval' => '12000'],
    ]);	}
    ?>
</div>

<p>
<?php echo nl2br($model['text']);?>
</p>
</div>

<p>
        <?= Html::a('Редактировать', ['update', 'id' => $id_news_int], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $id_news_int], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены? Запись будет удалена безвозвратно!!!',
                'method' => 'post',
            ],
        ]) ?>
</p>

</div>
