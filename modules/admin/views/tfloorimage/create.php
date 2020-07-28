<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TFloorImage */

$this->title = 'Create Tfloor Image';
$this->params['breadcrumbs'][] = ['label' => 'Tfloor Images', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tfloor-image-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
