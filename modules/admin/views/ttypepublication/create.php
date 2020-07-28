<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TTypePublication */

$this->title = 'Create Ttype Publication';
$this->params['breadcrumbs'][] = ['label' => 'Ttype Publications', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ttype-publication-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
