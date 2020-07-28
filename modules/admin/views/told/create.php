<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TOld */

$this->title = 'Create Told';
$this->params['breadcrumbs'][] = ['label' => 'Tolds', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="told-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
