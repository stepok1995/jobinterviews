<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TGrafik */

$this->title = 'Create TGrafik';
$this->params['breadcrumbs'][] = ['label' => 'TGrafik', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="twow-image-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
