<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TMusProjekt */

$this->title = 'Create Tmus Projekt';
$this->params['breadcrumbs'][] = ['label' => 'Tmus Projekts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tmus-projekt-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
