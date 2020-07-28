<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TTypeExc */

$this->title = 'Update Ttype Exc: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Ttype Excs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ttype-exc-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
