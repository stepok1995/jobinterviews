<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TOldSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tolds';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="told-index">

    <h1>КАТЕГОРИИ ПОСЕТИТЕЛЕЙ<?//= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
<a href="<?=Yii::$app->urlManager->createUrl(['admin/tpreiskurant'])?>"><h2>ВЕРНУТЬСЯ К РЕДАКТИРОВАНИЮ ПРЕЙСКУРАНТА</h2></a>
    <p>
        <?= Html::a('Создать категорию посетителей', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
