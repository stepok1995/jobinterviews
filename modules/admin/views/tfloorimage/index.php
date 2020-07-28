<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel app\models\TFloorImageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tfloor Images';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tfloor-image-index">

    <h1>Редактирование план-схем этажей</h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
	<a href="<?=Yii::$app->urlManager->createUrl(['admin/texpo'])?>"><h2>Вернуться к редактированию раздела Экспозиции</h2></a>
    <p>
        <?= Html::a('Создать план-схему', ['create'], ['class' => 'btn btn-success']) ?>
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
            'floor_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
