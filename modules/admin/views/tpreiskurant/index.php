<?php
namespace app\model;
use Yii;
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use app\models\TPreiskurant;
use app\models\TPreiskurantExc;
use app\models\TOld;
use app\models\TTypeExc;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TPreiskurantSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tpreiskurants';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tpreiskurant-index">

    <h1>РЕДАКТИРОВАТЬ ПРЕЙСКУРАНТ<?//= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
 <p>
        <?= Html::a('Создать запись в прейскуранте', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<div class="preiskurantPage">
	<div class="bannerPreiskurant">
		
	</div>
	<div class="contentPreiskurant">
		<h1>Стоимость услуг</h1><br/>
		<h2>Донецкий республиканский краеведческий музей</h2><br/>
		<div class="roller">
		
	<?php
	foreach($model as $item)
	{
		?>
		<p>
        <?= Html::a('Редактировать текст', ['update', 'id' => $item['id']], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $item['id']], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены? Запись будет удалена безвозвратно!!!',
                'method' => 'post',
            ],
        ]) ?>
</p>
		
		<?php
		echo nl2br($item['text']);	
	}
	?>	

		</div>
	</div>
</div>
</div>
