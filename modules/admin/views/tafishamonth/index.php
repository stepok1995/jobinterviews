<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TAfishaMonthSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tafisha Months';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tafisha-month-index">

    <h1>РЕДАКТИРОВАТЬ СЛАЙДЕР ЕЖЕМЕСЯЧНЫХ АФИШ</h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
	<ul>
<li><a href="<?=Yii::$app->urlManager->createUrl(['admin/tafishatype'])?>"><h2>РЕДАКТИРОВАТЬ КАТЕГОРИИ АФИШ</h2></a></li>
<li><a href="<?=Yii::$app->urlManager->createUrl(['admin/tafishaimage'])?>"><h2>РЕДАКТИРОВАТЬ НИЖНИЙ СЛАЙДЕР С АФИШАМИ</h2></a></li>
	</ul>
    <p>
        <?= Html::a('Вставить новую картинку в слайдер', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
          //  'name',
          [
        'label' => 'Картинка',
        'format' => 'raw',
        'value' => function($data){
        return Html::img(Url::toRoute($data->name),[
          'alt'=>'yii2 - картинка в gridview',
          'style' => 'width:300px;'
        ]);
        },
        ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
