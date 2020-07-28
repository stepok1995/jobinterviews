<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TVestnikSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tvestniks';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tvestnik-index">

    <h1>Редактирование раздела "Печатные издания"<?//= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Создать новую запись', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'text:ntext',
            'file_path',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
