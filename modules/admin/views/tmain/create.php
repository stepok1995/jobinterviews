<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TMainPage */

$this->title = 'Create Tmain Page';
$this->params['breadcrumbs'][] = ['label' => 'Tmain Pages', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tmain-page-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
