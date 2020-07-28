<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TMemberDoneckLand */

$this->title = 'Update Tmember Doneck Land: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Tmember Doneck Lands', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tmember-doneck-land-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
