<?php
namespace app\model;
use Yii;
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use app\models\TAction;
use app\models\TActionImage;
use yii\bootstrap\Carousel;
use yii\widgets\LinkPager;
use kartik\date\DatePicker;
use yii\helpers\Url;
?>

<div class="newsPagemain">
<div class="banner">
<!--<img style="width: 100%" src="/images/top/top2.jpg" alt="" />-->
</div>
<div class="picker">
</div>

		<div class="content">
			<h1>Архив анонсов</h1>
<?php

	$serv_time=date_default_timezone_set('Russia/Moscow');
				$today_date=date('Y-m-d H:i:s');
$i=0;
foreach($model as $item)
{
					if($today_date>$item['date'])
	{
	$i=$i+1;
?>
<tr>


<?php
		$model_image=TActionImage::find()
				->where(['action_id'=>$item['id']])
		->one();
?>
<div class="newsPage">
<!--<td style="width: 20%; padding: 1%; vertical-align: top;"> />-->
	<div class="photo">
	<a href="<?php echo Url::to(['taction/item-actions', 'id' =>$item['id']]); ?>">
					<div>
						<img style="width: 100%" src="<?= $item['img_preview'];?>">
					</div>
	</a>
	</div>
</td>
<!--<td style="width: calc(100% - 15%); padding: 1%; vertical-align: top;"> />-->
	<div class="titleH2">
	<a href="<?php echo Url::to(['taction/item-actions', 'id' =>$item['id']]); ?>">
			
				<h2><strong><?php echo $item['title'];?></strong></h2>
			
	</a>
	</div>	
	<div class="dateNews">	
<div class="<?php echo $text?>">						
				<?php 
				echo nl2br($item['text_preview'])?>
				</div>
	</div>			
</div>
</td>

</tr>
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
<?php
	}
 }
// if($i==0)
// {
?>
 <!--<h2> Интересующий Вас день прошёл без новостей.</h2>--><?php
// }
?>
<?= LinkPager::widget(['pagination'=>$pagination])?>
 </div>
</div>
