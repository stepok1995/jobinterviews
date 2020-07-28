<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;
use yii\models\TAnonsImage;

/* @var $this yii\web\View */
/* @var $model app\models\TAnons */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Tanons', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="taction-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
           // 'date',
            'title',
            'text:ntext',
					'text_preview:ntext',
			            [
    'label' => 'Превью',
    'format' => 'raw',
    'value' => function($data){
        return Html::img(Url::toRoute($data->img_preview),[
            'alt'=>'yii2 - картинка в gridview',
            'style' => 'width:100px;'
        ]);
    },
],
        ],
    ]) ?>

</div>
