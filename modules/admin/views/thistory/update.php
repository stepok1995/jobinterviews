<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\THistory */

$this->title = 'Update Thistory: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Thistories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="thistory-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
			'history_image'=>$history_image,
    ]) ?>

</div>
