<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TActionImage */

$this->title = 'Create Taction Image';
$this->params['breadcrumbs'][] = ['label' => 'Taction Images', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="taction-image-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
