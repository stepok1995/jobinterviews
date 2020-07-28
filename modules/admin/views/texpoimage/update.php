<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TExpoImage */

$this->title = 'Update Texpo Image: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Texpo Images', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="texpo-image-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
