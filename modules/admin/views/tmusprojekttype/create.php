<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TMusProjektType */

$this->title = 'Create Tmus Projekt Type';
$this->params['breadcrumbs'][] = ['label' => 'Tmus Projekt Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tmus-projekt-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
