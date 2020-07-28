<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TExpoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Texpos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="texpo-index">

    <h1>Редактировать раздел Экспозиция</h1>
	<a href="<?=Yii::$app->urlManager->createUrl(['admin/tfloorimage'])?>"><h2>Редактировать план-схемы эатажей</h2></a>
		<a href="<?=Yii::$app->urlManager->createUrl(['admin/texpoimage'])?>"><h2>Редактировать картинки экспозиций</h2></a>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Создать экспозицию', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            'text:ntext',
            'floor_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
