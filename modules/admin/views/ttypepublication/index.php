<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TTypePublicationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ttype Publications';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ttype-publication-index">

    <h1>Редактирование типов статей<?//= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
<h2><a href="<?=Yii::$app->urlManager->createUrl(['admin/tmemberdoneckland'])?>">Вернуться к редактированию статей</a></h2>
    <p>
        <?= Html::a('Create Ttype Publication', ['create'], ['class' => 'btn btn-success']) ?>
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
