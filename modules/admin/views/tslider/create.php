<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TSlider */

$this->title = 'Create Tslider';
$this->params['breadcrumbs'][] = ['label' => 'Tsliders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tslider-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
