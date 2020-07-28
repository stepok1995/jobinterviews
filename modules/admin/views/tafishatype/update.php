<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TAfishaType */

$this->title = 'Update Tafisha Type: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Tafisha Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tafisha-type-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
