<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TSaurImage */

$this->title = 'Update Tsaur Image: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Tsaur Images', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tsaur-image-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
