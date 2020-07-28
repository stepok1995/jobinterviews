<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\THistoryImage */

$this->title = 'Create Thistory Image';
$this->params['breadcrumbs'][] = ['label' => 'Thistory Images', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="thistory-image-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
