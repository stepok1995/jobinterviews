<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TMemberDoneckLand */

$this->title = 'Create Tmember Doneck Land';
$this->params['breadcrumbs'][] = ['label' => 'Tmember Doneck Lands', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tmember-doneck-land-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
