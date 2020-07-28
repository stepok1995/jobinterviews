<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TMemberDoneckLandSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tmember Doneck Lands';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tmember-doneck-land-index">

    <h1>Редактирование раздела "Память земли Донецкой"<?//= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
<h2><a href="<?=Yii::$app->urlManager->createUrl(['admin/ttypepublication'])?>">Редактировать типы статей</a></h2>
    <p>
        <?= Html::a('Создать статью', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            'text:ntext',
            'type_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
