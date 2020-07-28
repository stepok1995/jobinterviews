<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TActionImage */

$this->title = 'Update Taction Image: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Taction Images', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="taction-image-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
