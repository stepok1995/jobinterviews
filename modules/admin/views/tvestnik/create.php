<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TVestnik */

$this->title = 'Create Tvestnik';
$this->params['breadcrumbs'][] = ['label' => 'Tvestniks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tvestnik-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
