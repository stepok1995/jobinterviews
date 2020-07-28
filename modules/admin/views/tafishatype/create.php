<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TAfishaType */

$this->title = 'Create Tafisha Type';
$this->params['breadcrumbs'][] = ['label' => 'Tafisha Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tafisha-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
