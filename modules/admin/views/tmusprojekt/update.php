<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TMusProjekt */

$this->title = 'Update Tmus Projekt: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Tmus Projekts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tmus-projekt-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'model_img' => $model_img,
    ]) ?>

</div>
