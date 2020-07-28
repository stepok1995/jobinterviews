<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TExpo */

$this->title = 'Create Texpo';
$this->params['breadcrumbs'][] = ['label' => 'Texpos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="texpo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
