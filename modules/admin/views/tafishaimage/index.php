<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TAfishaImageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tafisha Images';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tafisha-image-index">

    <h1>Редактировать нижний слайдер с афишами<?//= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
	<a href="<?=Yii::$app->urlManager->createUrl(['admin/tafishamonth'])?>"><h2>Вернуться к редактированию слайдера ежемесячных афиш</h2></a>
    <p>
        <?= Html::a('Вставить новую картинку в слайдер', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            //'name'
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
            'afisha_type_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
