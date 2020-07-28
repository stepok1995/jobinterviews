<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TMusProjektTypeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tmus Projekt Types';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tmus-projekt-type-index">

    <h1>РЕДАКТИРОВАНИЕ РАЗДЕЛА КАТЕГОРИИ ПРОЕКТОВ<?//= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
<a href="<?=Yii::$app->urlManager->createUrl(['admin/tmusprojekt'])?>"><h2>ВЕРНУТЬСЯ К РЕДАКТИРОВАНИЮ ПРОЕКТОВ</h2></a>
    <p>
        <?= Html::a('Создать цикл', ['create'], ['class' => 'btn btn-success']) ?>
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
