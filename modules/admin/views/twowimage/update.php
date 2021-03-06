<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TWowImage */

$this->title = 'Update Twow Image: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Twow Images', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="twow-image-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
