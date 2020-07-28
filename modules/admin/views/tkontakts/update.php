<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TKontakts */

$this->title = 'Update TKontakts: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Tkontakts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->text, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="twow-image-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
