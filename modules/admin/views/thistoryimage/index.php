<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel app\models\THistoryImageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Thistory Images';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="thistory-image-index">

    <h1>ФОТО К РАЗДЕЛУ ИСТОРИИ<?//= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
<a href="<?=Yii::$app->urlManager->createUrl(['admin/thistory'])?>"><h2>ВЕРНУТЬСЯ К РЕДАКТИРОВАНИЮ РАЗДЕЛА ИСТОРИИ</h2></a>
    <p>
        <?= Html::a('Загрузить новую картинку', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            //'name',
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
            'history_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
