<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TAnonsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tanons';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="taction-index">

    <h1>Редактировать События</h1>
    <p>
        <?= Html::a('Создать событие', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            'text:ntext',
			'text_preview:ntext',
			            [
    'label' => 'Превью',
    'format' => 'raw',
    'value' => function($data){
        return Html::img(Url::toRoute($data->img_preview),[
            'alt'=>'yii2 - картинка в gridview',
            'style' => 'width:100px;'
        ]);
    },
],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
