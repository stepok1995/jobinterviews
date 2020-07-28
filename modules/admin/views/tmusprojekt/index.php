<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Carousel;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TMusProjektSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tmus Projekts';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="projectsPage">
	<div class="projectsBanner">
	</div>
	<div class="projectsTitle">
	<h1>МУЗЕЙНЫЕ ПРОЕКТЫ<?php //= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
<a href="<?=Yii::$app->urlManager->createUrl(['admin/tmusprojekttype'])?>"><h2>РЕДАКТИРОВАТЬ КАТЕГОРИИ ПРОЕКТОВ</h2></a>
    <p>
        <?= Html::a('Создать новое занятие', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
	
	  <p>
        <?= Html::a('Создать новый цикл занятий', ['./tmusprojekttype'], ['class' => 'btn btn-success']) ?>
    </p>
</div>
    

	<div class="projectsContent">
		<div class="container1">
			<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
				<?php
				foreach($model_Proj_Type as $item_Type)
				{
					$i=$item_Type['id'];
				?>
				<div class="panel panel-default">
					<div class="panel-heading" role="tab" id="heading<? =$i?>">
						<h5 class="panel-title">
							<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?=$i?>" aria-expanded="true" aria-controls="collapse<?=$i?>">
								<i class="more-less glyphicon glyphicon-plus"></i>
								<?php
									echo $item_Type['name'];
								?>
							</a>
						</h5>
					</div>
					<div id="collapse<?=$i?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading<?=$i?>">
						<?php
							foreach($model as $item)
							{
								$carusel=[];
								if($item_Type['id']==$item['project_type'])
								{
						?>
						<div class="panel-body">
							<div class="projectTable">
								<!-- <strong><?php echo $item['name'];?></strong> -->
								<div class="tableTitle">
									<h3><?php echo $item['name'];?></h3>
								</div>
								<div class="tableText">
									<p>
									<?php echo nl2br($item['text'])?>
									</p>
								</div>
								
									<?php
									// $count=0;
										foreach($model_image as $item_image)
									{
										if($item_image['project_id']==$item['id'])
										{
											// $count=$count+1;
											$carusel[]=

												[
												'content' => '<img src="'.$item_image['name'].'"/>',
												'options' => []
												];
										$name=$item_image['name'];
										}
										
									}
									// if($count==1)
									// {
										?>
										<!--<div class="tableImg">
											<img src="<?php //echo $name;?>" alt=""/>
										</div>-->
										<?php
									// }
									// else{
									?>
									
									<div class="tableImg">
						
										<div style="display: none;" class="row">
											<?php echo Carousel::widget([
												'items' => $carusel,
												'options' => ['class' => 'carousel slide', 'data-interval' => '12000'],
											]);
											?>

										</div>
										<img src="<?php echo $name;?>" alt=""/>
									</div>
									
									<?php
									// }
									?>
									
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
						?>
					</div>
				</div>
				<?php
				}
				?>
			</div> <!--panel-group -->

		</div><!-- container -->
	</div>
</div>
	


