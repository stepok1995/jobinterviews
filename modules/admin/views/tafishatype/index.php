<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TAfishaTypeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tafisha Types';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tafisha-type-index">

    <h1>РЕДАКТИРОВАНИЕ КАТЕГОРИЙ АФИШ<?//= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
	<ul>
<li><a href="<?=Yii::$app->urlManager->createUrl(['admin/tafishamonth'])?>"><h2>ВЕРНУТЬСЯ К РЕДАКТИРОВАНИЮ СЛАЙДЕРА ЕЖЕМЕСЯЧНЫХ АФИШ</h2></a></li>
<li><a href="<?=Yii::$app->urlManager->createUrl(['admin/tafishaimage'])?>"><h2>ВЕРНУТЬСЯ К РЕДАКТИРОВАНИЮ НИЖНЕГО СЛАЙДЕРА С АФИШАМИ</h2></a></li>
</ul>
    <p>
        <?= Html::a('Создать новую категорию афиш', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
