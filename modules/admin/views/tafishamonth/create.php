<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TAfishaMonth */

$this->title = 'Create Tafisha Month';
$this->params['breadcrumbs'][] = ['label' => 'Tafisha Months', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tafisha-month-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
