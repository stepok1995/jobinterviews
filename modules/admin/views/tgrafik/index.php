<?php

use yii\helpers\Html;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel app\models\TWowImageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tgrafik';
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
						<!--<img style="width: 100%" src="/images/Filial/VOV.jpg" alt="" />-->
						</div>
<div class="WoWTitle">		




<h1> График работы</h1>
	</div>	


			
<div class="WoWText">
<?php
foreach($model as $item){
	echo nl2br($item['text']);
}
?>
<p>
        <?= Html::a('Редактировать текст', ['update', 'id' => $item['id']], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $item['id']], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены? Запись будет удалена безвозвратно!!!',
                'method' => 'post',
            ],
        ]) ?>
</p>
</div>


</div>
</div>
