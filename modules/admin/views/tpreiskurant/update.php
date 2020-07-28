<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TPreiskurant */

$this->title = 'Update Tpreiskurant: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Tpreiskurants', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tpreiskurant-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
