<?php
use app\models\TActionImage;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\db\ActiveRecord;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TActionImageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Taction Images';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="taction-image-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Taction Image', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            //'name:image',
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
        //  'action_id.name',
        [
      'label'=>'Новость',
      'format'=>'text', // Возможные варианты: raw, html
        'value'=>function($data){
          return $data->getActionName();
      },
  //   'filter' => TActionImage::getActionsList()
  ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
