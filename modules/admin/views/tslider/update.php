<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TSlider */

$this->title = 'Update Tslider: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Tsliders', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tslider-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
