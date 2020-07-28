<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TPreiskurant */

$this->title = 'Create Tpreiskurant';
$this->params['breadcrumbs'][] = ['label' => 'Tpreiskurants', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tpreiskurant-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
