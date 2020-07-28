<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TOld */

$this->title = 'Update Told: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Tolds', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="told-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
