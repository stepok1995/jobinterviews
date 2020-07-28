<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel app\models\TExpoImageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Texpo Images';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="texpo-image-index">

    <h1><?= Html::encode($this->title) ?></h1>
    		<a href="<?=Yii::$app->urlManager->createUrl(['admin/texpo'])?>"><h2>Вернуться к редактированию экспозиций</h2></a>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Texpo Image', ['create'], ['class' => 'btn btn-success']) ?>
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
            'expo_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
