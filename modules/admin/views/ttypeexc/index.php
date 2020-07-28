<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TTypeExcSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ttype Excs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ttype-exc-index">

    <h1>КАТЕГОРИИ ЭКСКУРСИЙ<?//= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
<a href="<?=Yii::$app->urlManager->createUrl(['admin/tpreiskurant'])?>"><h2>ВЕРНУТЬСЯ К РЕДАКТИРОВАНИЮ ПРЕЙСКУРАНТА</h2></a>
    <p>
        <?= Html::a('Создать новую категорию', ['create'], ['class' => 'btn btn-success']) ?>
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
