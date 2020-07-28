<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel app\models\TMainPageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tmain Pages';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tmain-page-index">

       <h1>Главная страница<?php //= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
<!--<a href="<?=Yii::$app->urlManager->createUrl(['admin/tslider'])?>"><h2>Редактировать слайдер главной страницы</h2></a>-->
	    <p>
        <?= Html::a('Редактировать раздел Анонсы', ['./taction/anons'], ['class' => 'btn btn-success']) ?>
    </p>  
  <p>
        <?= Html::a('Редактировать раздел Гуманитарная программа', ['./taction/gum'], ['class' => 'btn btn-success']) ?>
        <?php //= Html::a('Создать новый раздел', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
	    <p>
        <?= Html::a('Редактировать раздел Русский центр', ['./taction/rus'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            'link',
          //  'image',
          [
        'label' => 'Картинка',
        'format' => 'raw',
        'value' => function($data){
        return Html::img(Url::toRoute($data->image),[
          'alt'=>'yii2 - картинка в gridview',
          'style' => 'width:300px;'
        ]);
        },
        ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
