<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TAfishaImage */

$this->title = 'Create Tafisha Image';
$this->params['breadcrumbs'][] = ['label' => 'Tafisha Images', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tafisha-image-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
