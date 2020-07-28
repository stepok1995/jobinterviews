<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TWowImage */

$this->title = 'Create Twow Image';
$this->params['breadcrumbs'][] = ['label' => 'Twow Images', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="twow-image-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
