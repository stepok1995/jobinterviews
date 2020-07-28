<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TAction */

$this->title = 'Create Taction';
$this->params['breadcrumbs'][] = ['label' => 'Tactions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="taction-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
		 'hour' => $hour,
    ]) ?>

</div>
