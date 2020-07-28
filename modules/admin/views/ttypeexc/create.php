<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TTypeExc */

$this->title = 'Create Ttype Exc';
$this->params['breadcrumbs'][] = ['label' => 'Ttype Excs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ttype-exc-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
