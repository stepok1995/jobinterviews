<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use app\models\TExpo;
use app\models\TFloor;
use app\models\TFloorImage;
use yii\bootstrap\Carousel;
/* @var $this yii\web\View */
/* @var $searchModel app\models\TExpoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Texpos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div style="max-width: 90% !important;" class="texpo-index">

<h2>Экспозиция 3 этаж</h2>


    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Создать экспозицию', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

<div class="expoPage">
<div class="bannerexpoPage">
</div>
<!--<div class="IMAGE">
<img src="/images/FloorImage/83cd6d48f95f31c16ac52166741add6b7d4847bf5b742f002703f.png"/>
</div>-->
				<div class="Map">
					<!--		 <img src="<?php //foreach($image_floor as $item_im_floor)
								// {echo $item_im_floor['name'];}?>" alt="" />
						<div id="map">
						</div>-->

				</div>
<div class="contentexpoPage">

			
<div class="container1">
	<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
<?php
	foreach($model as $item)
	{
	$i=$item['id'];
	$carusel=[];
?>
			 <div style="width: 100% !important" class="panel panel-default">
            <div style="width: 100% !important" class="panel-heading" role="tab" id="heading<?=$i?>">
                <h5 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?=$i?>" aria-expanded="true" aria-controls="collapse<?=$i?>">
                        <i class="more-less glyphicon glyphicon-plus"></i>
						<?php echo $item['title'];?>
                    </a>
                </h5>
            </div>
		<div style="width: 100% !important" id="collapse<?=$i?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading<?=$i?>">
			<div class="panel-body">
		<?php
			foreach($model_image as $item_image)
		{
			if($item_image['expo_id']==$item['id'])
			{
				$carusel[]=

					[
					'content' => '<img src="'.$item_image['name'].'"/>',
					'options' => []
					];
			}
		}
		?>
<div class="row">
    <?php echo Carousel::widget([
        'items' => $carusel,
		'options' => ['class' => 'carousel slide', 'data-interval' => '12000'],
    ]);
    ?>
</div>

			<p><?php echo nl2br($item['text']);?></p>
			</div>
		</div>

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
	<?php
			}
		?>
</div>
</div>
</div>
</div>
</div>
