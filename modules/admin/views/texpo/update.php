<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TExpo */

$this->title = 'Update Texpo: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Texpos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="texpo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
		'expo_image'=>$expo_image,
    ]) ?>

</div>
