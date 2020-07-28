<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TTypePublication */

$this->title = 'Update Ttype Publication: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Ttype Publications', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ttype-publication-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
