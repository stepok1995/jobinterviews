<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TSaurImage */

$this->title = 'Create Tsaur Image';
$this->params['breadcrumbs'][] = ['label' => 'Tsaur Images', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tsaur-image-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
