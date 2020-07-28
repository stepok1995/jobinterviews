<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel app\models\TSliderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tsliders';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tslider-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавть новую картинку в главный слайдер', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
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
		  'title',
		  'link',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
