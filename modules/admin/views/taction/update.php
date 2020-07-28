<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TAction */

$this->title = 'Update Taction: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Tactions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="taction-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'hour' => $hour,
		'model_img'=>$model_img,
		'model_img_preview'=>$model_img_preview,
    ]) ?>

</div>
