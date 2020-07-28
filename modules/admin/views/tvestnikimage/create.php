<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TVestnikImage */

$this->title = 'Create Tvestnik Image';
$this->params['breadcrumbs'][] = ['label' => 'Tvestnik Images', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tvestnik-image-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
