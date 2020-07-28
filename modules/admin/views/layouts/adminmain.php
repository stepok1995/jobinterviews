<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AdminAsset;
use yii\bootstrap\Carousel;

AdminAsset::register($this);
?>
<?php $this->beginPage() ?>

<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

	<div id="top">
	<div>
		<span>
		<h4>
		<p>
			Режим работы:<br>
			9:00 - 16:00<br>
			выходные дни - понедельник, вторник<br>
			</p>
			<p>Адрес музея:<br>
			Донецкая Народная Республика<br>
			г.Донецк, ул.Челюскинцев, 189-А<br>
			Телефон: (062) 311 33 51</p>
			</h4>
		</span>
	</div>
</div>
	<div id="menu">

	<h3>Меню Администратора<h3>

	<ul class="sc_menu-body">
		<li><a class="pressed" href="<?=Yii::$app->urlManager->createUrl(['admin/tmain'])?>"><span>Главная</span></a></li>
		<li><a href="<?=Yii::$app->urlManager->createUrl(['admin/thistory'])?>"><span>О Музее</span></a>
			<ul>
				<li><a href="<?=Yii::$app->urlManager->createUrl(['admin/thistory'])?>"><span>История музея</span></a></li>
						<li>
							<a href="<?=Yii::$app->urlManager->createUrl(['admin/twowimage'])?>"><span>Отделы</span></a>
								<ul class="submenu">
									<li><a href="<?=Yii::$app->urlManager->createUrl(['admin/twowimage'])?>"><span>Военно-исторический музей Великой Отечественной Войны</span></a></li>
									<li><a href="<?=Yii::$app->urlManager->createUrl(['admin/tsaurimage'])?>"><span>Мемориальный комплекс Саур-Могила</span></a></li>
								</ul>
						</li>
						<li><a href="<?=Yii::$app->urlManager->createUrl(['admin/tkontakts'])?>"><span>Контакты</span></a></li>
			</ul>
		</li>
		<li><a href="<?=Yii::$app->urlManager->createUrl(['admin/tpreiskurant'])?>"><span>Посетителю</span></a>
			<ul>
				<li><a href="<?=Yii::$app->urlManager->createUrl(['admin/tgrafik'])?>"><span>График работы</span></a></li>
				<li><a href="<?=Yii::$app->urlManager->createUrl(['admin/taction/show'])?>"><span>Выставки</span></a></li>
				<li><a href="<?=Yii::$app->urlManager->createUrl(['admin/texpo/floor1'])?>"><span>Экспозиции</span></a>
							<ul class="submenu">
								<li><a href="<?=Yii::$app->urlManager->createUrl(['admin/texpo/floor1'])?>"><span>Этаж 1</span></a></li>
								<li><a href="<?=Yii::$app->urlManager->createUrl(['admin/texpo/floor2'])?>"><span>Этаж 2</span></a></li>
								<li><a href="<?=Yii::$app->urlManager->createUrl(['admin/texpo/floor3'])?>"><span>Этаж 3</span></a></li>
								<li><a href="<?=Yii::$app->urlManager->createUrl(['admin/texpo/floor4'])?>"><span>Этаж 4</span></a></li>
							</ul>
				</li>		
				<li><a href="<?=Yii::$app->urlManager->createUrl(['admin/tmusprojekt'])?>"><span>Интерактивы</span></a></li>
				<li><a href="<?=Yii::$app->urlManager->createUrl(['admin/tafishamonth'])?>"><span>Афиша</span></a></li>
				<li><a href="<?=Yii::$app->urlManager->createUrl(['admin/tpreiskurant'])?>"><span>Прейскурант</span></a></li>
			</ul>
		</li>

		<li><a href="<?=Yii::$app->urlManager->createUrl(['admin/taction/weekend'])?>"><span>Музейные проекты</span></a>
			<ul>
				<!--<li><a href="<?=Yii::$app->urlManager->createUrl(['admin/taction/gum'])?>"><span>Гуманитарная программа</span></a></li>
				<li><a href="<?=Yii::$app->urlManager->createUrl(['admin/taction/rus'])?>"><span>Русский центр</span></a></li>-->
				<li><a href="<?=Yii::$app->urlManager->createUrl(['admin/taction/weekend'])?>"><span>Нескучный выходной</span></a></li>
				<li><a href="<?=Yii::$app->urlManager->createUrl(['admin/taction/gift'])?>"><span>Дни дарения</span></a></li>	
				<li><a href="<?=Yii::$app->urlManager->createUrl(['admin/taction/intermus'])?>"><span>Интермузей</span></a></li>	
			</ul>
		</li>
		
		
		<li><a href="<?=Yii::$app->urlManager->createUrl(['admin/taction'])?>"><span>Новости</span></a></li>
		<li><a href="<?=Yii::$app->urlManager->createUrl(['admin/tvestnik'])?>"><span>Публикации</span></a>
			<ul>
				<li><a href="<?=Yii::$app->urlManager->createUrl(['admin/taction/interview'])?>"><span>Интервью</span></a></li>
				<li><a href="<?=Yii::$app->urlManager->createUrl(['admin/taction/ourhistory'])?>"><span>Страницы нашей истории</span></a></li>	
				<li><a href="<?=Yii::$app->urlManager->createUrl(['admin/taction/zemlaki'])?>"><span>Земляки</span></a></li>	
				<li><a href="<?=Yii::$app->urlManager->createUrl(['admin/taction/landmarks'])?>"><span>Достопримечательности Донбасса</span></a></li>	
				<li><a href="<?=Yii::$app->urlManager->createUrl(['admin/taction/historyoneexp'])?>"><span>История одного экспоната</span></a></li>	
				<li><a href="<?=Yii::$app->urlManager->createUrl(['admin/tvestnik'])?>"><span>Музейный вестник</span></a></li>	
			</ul>
		</li>
	</ul>

</div>
    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>

<?php $this->endBody() ?>
<footer class="footer">
   <div id="bottom">
<table><tbody><tr>
<td class="text_footer"><strong>Министерство культуры <br>Донецкой Народной Республики</strong><br>
<a href="http://www.mincult.govdnr.ru/"><img src="../images/futer/filials.jpg" alt=""></a>
<p></p>
</td>
<td class="text_footer"><strong>Как нас найти</strong><br><br>
<a href="https://yandex.ua/maps/142/donetsk/?lang=ru&mode=search&text=Ljytwrbq%20rhftdtlxtcrbq%20veptq&sll=37.802850%2C48.015877&sspn=0.314484%2C0.122316&ol=biz&oid=1116296039&ll=37.804781%2C48.025074&z=16"><img src="../images/futer/map.jpg" alt=""></a>
</td>
<td  class="text_footer" style="width:130px"><strong>Мы&nbsp;в&nbsp;социальных&nbsp;сетях:</strong><br><br>

<a href="https://vk.com/drkm_official" class="soc1"></a>
<a href="https://www.facebook.com/drkm.official" class="soc2"></a>
<br><br><br><br>
</td>
<td>
  <?php
  echo Yii::$app->user->isGuest ? (
              ['label' => 'Login', 'url' => ['/site/login']]
          ) : (
              Html::beginForm(['/site/logout'], 'post')
              . Html::submitButton(
                  'Logout (' . Yii::$app->user->identity->username . ')',
                  ['class' => 'btn btn-link logout']
              )
              . Html::endForm()
          )
  ?>
</td>
<td></td>
</tr></tbody></table>

<div>

<div>© www.drkm |
<span>Разработано отделом компьютерных технологий и дизайна Донецкого Республиканского Краеведческого Музея | 2017</span>
</div>
</div>
</div>
</footer>


<?php $this->endPage() ?>
</body>
