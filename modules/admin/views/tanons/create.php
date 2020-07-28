<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TAnons */

$this->title = 'Create Tanons';
$this->params['breadcrumbs'][] = ['label' => 'Tanons', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="taction-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
