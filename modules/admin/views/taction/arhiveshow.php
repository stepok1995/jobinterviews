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
	<!--<img style="width: 100%" src="/images/top/top2.jpg" alt="" /> -->
	<div class="banner">
		<h1>Архив прошедших выставок</h1>
	</div>
	<div class="content">
	
		<?php
			// $serv_time=date_default_timezone_set('Russia/Moscow');
				// $today_date=date('Y-m-d H:i:s');
		$i=0;
		foreach($model as $item)
		{
				if($item['arhive']==1)
	{
			$i=$i+1;
		?>
		
		<div class="newsPage">
			<?php
					$model_image=TActionImage::find()
							->where(['action_id'=>$item['id']])
					->one();
			?>
			<div class="photo">
			
				<a href="<?php echo Url::to(['taction/item-actions', 'id' =>$item['id']]); ?>">
								<div>
									<img style="width: 100%" src="<?= $item['img_preview'];?>">
								</div>
				</a>
			</div>
			<div class="title">
				<a href="<?php echo Url::to(['taction/item-actions', 'id' =>$item['id']]); ?>">
						<div>
							<h2><?php echo $item['title'];?></h2>
						</div>
				</a>
			</div>	
			<div class="dateNews">
				<?php 
				echo nl2br($item['text_preview'])?>
			</div>
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
		</div>	
			<?php
	}
		 }
		 // if($i==0)
		 // {
		?> <!--<a href="<?php  //echo Url::to(['site/arhiveshow']);?>"><h2> Архив прошедших выставок</h2></a>--><?php
		 // }
		?>
		<?= LinkPager::widget(['pagination'=>$pagination])?>
	</div>
</div>
