<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use app\models\THistory;
use app\models\THistoryImage;

/* @var $this yii\web\View */
/* @var $searchModel app\models\THistorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Thistories';
$this->params['breadcrumbs'][] = $this->title;
?>
<div style="max-width: 90% !important;" class="thistory-index">

    <h1>ИСТОРИЯ МУЗЕЯ</h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Создать новую запись', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

   <div class="historyPage">
<div class="bannerHist">
</div>


<div class="contentHist">

<?php
$per=' ';
foreach ($model as $item)
{    
?>
	<div class="divContentHist">		

								<?php
								if($item['date']!=$per)
								{
									$per=$item['date'];
								?>
								<div class="dateHist">
								<div class="date_september">
								<?php echo $item['date'];?>
									<!--<div class="separation"></div>-->
								</div>
								</div>
								<?php
								}
									$history_image=THistoryImage::find()
									->where(['history_id'=>$item['id']])
									->asArray()
									->all();
								?>
				
									<div class="imgHist">
										<p><img src="<?= $history_image[0]['name']?>"></p>
									</div>

									<div class="textHist">
									
										<?php echo nl2br($item['text']);?>
									
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
?>

</div>

</div>
</div>
