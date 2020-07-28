<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TPreiskurantExc */

$this->title = 'Create Tpreiskurant Exc';
$this->params['breadcrumbs'][] = ['label' => 'Tpreiskurant Excs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tpreiskurant-exc-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
