<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TPreiskurantExcSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tpreiskurant Excs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tpreiskurant-exc-index">

    <h1>ПРЕЙСКУРАНТ ДЛЯ ЭКСКУРСИЙ<?//= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
<a href="<?=Yii::$app->urlManager->createUrl(['admin/tpreiskurant'])?>"><h2>ВЕРНУТЬСЯ К РЕДАКТИРОВАНИЮ ПРЕЙСКУРАНТА</h2></a>
    <p>
        <?= Html::a('Создать запись в прейскуранте', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'type_ex_id',
            'cost',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
