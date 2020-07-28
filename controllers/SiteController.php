<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\User;
use app\models\ContactForm;
use app\models\MyForm;
use app\models\TPreiskurant;
use app\models\TPreiskurantExc;
use app\models\TMusProjekt;
use app\models\TMusProjektType;
use app\models\TMPImage;
use app\models\TActionImage;
use app\models\TAction;
use app\models\TAnons;
use app\models\TAnonsImage;
use app\models\TExpo;
use app\models\TExpoImage;
use app\models\TFloorImage;
use app\models\THistory;
use app\models\THistoryImage;
use app\models\TAfishaImage;
use app\models\TAfishaMonth;
use app\models\TAfishaType;
use app\models\TAfisha;
use app\models\TMainPage;
use app\models\TSlider;
use app\models\TKontakts;
use app\models\TVestnik;
use app\models\TVestnikImage;
use app\models\TMemberDoneckLandImage;
use app\models\TMemberDoneckLand;
use app\models\TTypePublication;
use app\models\TSaurImage;
use app\models\TSaur;
use app\models\TGrafik;
use app\models\TWowImage;
use app\models\TWow;
use yii\data\Pagination;
use yii\widgets\LinkPager;

class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['hello'],
                'rules' => [
                    [
                        'actions' => ['hello'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            Yii::$app->urlManager->createUrl(['admin/tmain']);//goBack();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }



    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }



	public function actionGrafik()
	{
		$model=TGrafik::find()
		->all();
			  return $this->render('grafik',[
			  'model'=>$model
			  ]);
	}

  public function actionDocumentation()
	{
			  return $this->render('documentation');
	}

  public function actionTender()
{
      return $this->render('tender');
}

			public function actionAdministration()
	{
			  return $this->render('administration');
	}

		public function actionExcersi()
	{
			  return $this->render('excersi');
	}

		public function actionPreiskurant()
	{
		$model=TPreiskurant::find()
		->all();
		return $this->render('preiskurant',[
		'model'=>$model
		]);
	}

		public function actionProject()
	{
		$image = [];
		$model=TMusProjekt::find()
		->all();
		$model_Proj_Type=TMusProjektType::find()
		->all();
		$model_image=TMPImage::find()
		->all();
		return $this->render('project',[
			  'model'=>$model,'model_Proj_Type'=>$model_Proj_Type,'model_image'=>$model_image,
			  ]);
	}

	public function actionKontakts()
	{
		$model=TKontakts::find()
		->all();
			  return $this->render('kontakts',['model'=>$model]);
	}

		public function actionVisitingrules()
	{
			  return $this->render('visitingrules');
	}

			public function actionFloor1()
	{
		$model=TExpo::find()
		->where(['floor_id'=>1])
		->all();
		$image_floor=TFloorImage::find()
		->where(['floor_id'=>1])
		->all();
		$model_image=TExpoImage::find()
		->all();
			  return $this->render('floor1',[
			  'model'=>$model,'image_floor'=>$image_floor,'model_image'=>$model_image,
			  ]);
	}

				public function actionFloor2()
	{
		$model=TExpo::find()
		->where(['floor_id'=>2])
		->all();
		$image_floor=TFloorImage::find()
		->where(['floor_id'=>2])
		->all();
		$model_image=TExpoImage::find()
		->all();
			  return $this->render('floor2',[
			  'model'=>$model,'image_floor'=>$image_floor,'model_image'=>$model_image,
			  ]);
	}

					public function actionFloor3()
	{
		$model=TExpo::find()
		->where(['floor_id'=>3])
		->all();
		$image_floor=TFloorImage::find()
		->where(['floor_id'=>3])
		->all();
		$model_image=TExpoImage::find()
		->all();
			  return $this->render('floor3',[
			  'model'=>$model,'image_floor'=>$image_floor,'model_image'=>$model_image,
			  ]);
	}

						public function actionFloor4()
	{
		$model=TExpo::find()
		->where(['floor_id'=>4])
		->all();
$image_floor=TFloorImage::find()
		->where(['floor_id'=>4])
		->all();
		$model_image=TExpoImage::find()
		->all();
			  return $this->render('floor4',[
			  'model'=>$model,'image_floor'=>$image_floor,'model_image'=>$model_image,
			  ]);
	}

		public function actionLibrary()
	{
			  return $this->render('library');
	}

			public function actionHistory()
	{
		$model=THistory::find()
		->orderBy('flag')
		->all();
			  return $this->render('history',[
			  'model'=>$model,
			  ]);
	}

			public function actionWow()
	{
				$model=TWowImage::find()
		->all();
		$model_text=TWow::find()
		->all();
			  return $this->render('wow',[
			  'model'=>$model,
			  'model_text'=>$model_text,
			  ]);
	}

				public function actionSaur()
	{
	$model=TSaurImage::find()
		->all();
				$model_text=TWow::find()
		->all();
			  return $this->render('saur',[
			  'model'=>$model,
			  			  'model_text'=>$model_text,
			  ]);
	}

					public function actionAfisha()
	{
					// if(Yii::$app->request->post())//если есть пост запрос, то находим ИД
			// {
				// $per=Yii::$app->request->post();
				// $afisha_type_id=$per['TAfishaType']['id'];
			// $model_image=TAfishaImage::find()
			// ->where(['afisha_type_id'=>$afisha_type_id])
			// ->all();
			// }
		// else
		// {
			// $model_image=TAfishaImage::find()
			// ->all();
		// }

			$model_month=TAfishaMonth::find()
			->all();

			  return $this->render('afisha',['model_month'=>$model_month,'model_image'=>$model_image,]);
	}

					public function actionActions()
	{
if(Yii::$app->request->post())//если есть пост запрос, то находим ИД
			{
				$model=TAction::find()
				//->where(['!=','class_id',1])
				->all();
				$per=Yii::$app->request->post();
				$date=$per['TAction']['date'];
				$pagination = new Pagination([
			'defaultPageSize'=>10,
			'totalCount'=>$model->count(),
      'params' => array_merge($_POST, ['date' => $date]),
			]);
				$model=$model->offset($pagination->offset)
			->limit($pagination->limit)
			->orderBy(['date'=>SORT_DESC, 'id'=>SORT_DESC])
			//->orderBy(['topnews'=>SORT_DESC])
			->where(['date'=>$date])
			//->where(['class_id'=>2])
				->andWhere(['topnews'=>0])
			->all();
			}
		else
		{
			$model=TAction::find();
				$pagination = new Pagination([
			'defaultPageSize'=>10,
			'totalCount'=>$model->count()
			]);
				$model=$model->offset($pagination->offset)
			->limit($pagination->limit)
			->orderBy(['date'=>SORT_DESC, 'id'=>SORT_DESC])
			//->orderBy(['topnews'=>SORT_DESC])
			//->where(['class_id'=>2])
			//->where(['topnews'=>0])
			->all();
						// $model_top=TAction::find()//модель для топовой новости
			// ->orderBy(['date'=>SORT_DESC])
				// ->where(['class_id'=>2])
				// ->andWhere(['topnews'=>1])
				// ->all();
		}

		$model_image=TActionImage::find()
		->all();
			  return $this->render('actions',['model'=>$model,'model_image'=>$model_image,'pagination'=>$pagination]);
	}

	public function actionAnons()
	{
		// if(Yii::$app->request->post())//если есть пост запрос, то находим ИД
			// {
				// $model=TAction::find();
				// $per=Yii::$app->request->post();
				// $date=$per['TAction']['date'];
				// $pagination = new Pagination([
			// 'defaultPageSize'=>10,
			// 'totalCount'=>$model->count(),
      // 'params' => array_merge($_POST, ['date' => $date]),
			// ]);
				// $model=$model->offset($pagination->offset)
			// ->limit($pagination->limit)
	// ->orderBy(['date'=>SORT_DESC])
			// ->orderBy(['id'=>SORT_DESC])
			// ->where(['date'=>$date])
			// ->all();
			// }
		// else
		// {
			$model=TAction::find()
			->where(['class_id'=>3]);
				$pagination = new Pagination([
			'defaultPageSize'=>10,
			'totalCount'=>$model->count()
			]);
				$model=$model->offset($pagination->offset)
			->limit($pagination->limit)
			// ->orderBy(['date'=>SORT_DESC])
			->orderBy(['id'=>SORT_DESC])
				->where(['class_id'=>3])
			->all();
		// }

		$model_image=TActionImage::find()
		->all();
			  return $this->render('anons',['model'=>$model,'model_image'=>$model_image,'pagination'=>$pagination]);
	}

		public function actionHistoryoneexp()
	{
		// if(Yii::$app->request->post())//если есть пост запрос, то находим ИД
			// {
				// $model=TAction::find();
				// $per=Yii::$app->request->post();
				// $date=$per['TAction']['date'];
				// $pagination = new Pagination([
			// 'defaultPageSize'=>10,
			// 'totalCount'=>$model->count(),
      // 'params' => array_merge($_POST, ['date' => $date]),
			// ]);
				// $model=$model->offset($pagination->offset)
			// ->limit($pagination->limit)
	// ->orderBy(['date'=>SORT_DESC])
			// ->orderBy(['id'=>SORT_DESC])
			// ->where(['date'=>$date])
			// ->all();
			// }
		// else
		// {
			$model=TAction::find()
				->where(['class_id'=>5]);
				$pagination = new Pagination([
			'defaultPageSize'=>10,
			'totalCount'=>$model->count()
			]);
				$model=$model->offset($pagination->offset)
			->limit($pagination->limit)
			// ->orderBy(['date'=>SORT_DESC])
			->orderBy(['date'=>SORT_DESC])
				->where(['class_id'=>5])
			->all();
		// }

		$model_image=TActionImage::find()
		->all();
			  return $this->render('historyoneexp',['model'=>$model,'model_image'=>$model_image,'pagination'=>$pagination]);
	}

	public function actionWeekend()
	{
		// if(Yii::$app->request->post())//если есть пост запрос, то находим ИД
			// {
				// $model=TAction::find();
				// $per=Yii::$app->request->post();
				// $date=$per['TAction']['date'];
				// $pagination = new Pagination([
			// 'defaultPageSize'=>10,
			// 'totalCount'=>$model->count(),
      // 'params' => array_merge($_POST, ['date' => $date]),
			// ]);
				// $model=$model->offset($pagination->offset)
			// ->limit($pagination->limit)
	// ->orderBy(['date'=>SORT_DESC])
			// ->orderBy(['id'=>SORT_DESC])
			// ->where(['date'=>$date])
			// ->all();
			// }
		// else
		// {
			$model=TAction::find()
				->where(['class_id'=>6]);
				$pagination = new Pagination([
			'defaultPageSize'=>10,
			'totalCount'=>$model->count()
			]);
				$model=$model->offset($pagination->offset)
			->limit($pagination->limit)
			// ->orderBy(['date'=>SORT_DESC])
			->orderBy(['date'=>SORT_DESC])
				->where(['class_id'=>6])
			->all();
		// }

		$model_image=TActionImage::find()
		->all();
			  return $this->render('weekend',['model'=>$model,'model_image'=>$model_image,'pagination'=>$pagination]);
	}

		public function actionGift()
	{
		// if(Yii::$app->request->post())//если есть пост запрос, то находим ИД
			// {
				// $model=TAction::find();
				// $per=Yii::$app->request->post();
				// $date=$per['TAction']['date'];
				// $pagination = new Pagination([
			// 'defaultPageSize'=>10,
			// 'totalCount'=>$model->count(),
      // 'params' => array_merge($_POST, ['date' => $date]),
			// ]);
				// $model=$model->offset($pagination->offset)
			// ->limit($pagination->limit)
	// ->orderBy(['date'=>SORT_DESC])
			// ->orderBy(['id'=>SORT_DESC])
			// ->where(['date'=>$date])
			// ->all();
			// }
		// else
		// {
			$model=TAction::find()
			->where(['class_id'=>7]);
				$pagination = new Pagination([
			'defaultPageSize'=>10,
			'totalCount'=>$model->count()
			]);
				$model=$model->offset($pagination->offset)
			->limit($pagination->limit)
			// ->orderBy(['date'=>SORT_DESC])
			->orderBy(['date'=>SORT_DESC])
				->where(['class_id'=>7])
			->all();
		// }

		$model_image=TActionImage::find()
		->all();
			  return $this->render('gift',['model'=>$model,'model_image'=>$model_image,'pagination'=>$pagination]);
	}

	public function actionInterview()
	{
		// if(Yii::$app->request->post())//если есть пост запрос, то находим ИД
			// {
				// $model=TAction::find();
				// $per=Yii::$app->request->post();
				// $date=$per['TAction']['date'];
				// $pagination = new Pagination([
			// 'defaultPageSize'=>10,
			// 'totalCount'=>$model->count(),
      // 'params' => array_merge($_POST, ['date' => $date]),
			// ]);
				// $model=$model->offset($pagination->offset)
			// ->limit($pagination->limit)
	// ->orderBy(['date'=>SORT_DESC])
			// ->orderBy(['id'=>SORT_DESC])
			// ->where(['date'=>$date])
			// ->all();
			// }
		// else
		// {
			$model=TAction::find()
				->where(['class_id'=>4]);
				$pagination = new Pagination([
			'defaultPageSize'=>10,
			'totalCount'=>$model->count()
			]);
				$model=$model->offset($pagination->offset)
			->limit($pagination->limit)
			// ->orderBy(['date'=>SORT_DESC])
			->orderBy(['date'=>SORT_DESC])
				->where(['class_id'=>4])
			->all();
		// }

		$model_image=TActionImage::find()
		->all();
			  return $this->render('interview',['model'=>$model,'model_image'=>$model_image,'pagination'=>$pagination]);
	}

	public function actionOurhistory()
	{
		// if(Yii::$app->request->post())//если есть пост запрос, то находим ИД
			// {
				// $model=TAction::find();
				// $per=Yii::$app->request->post();
				// $date=$per['TAction']['date'];
				// $pagination = new Pagination([
			// 'defaultPageSize'=>10,
			// 'totalCount'=>$model->count(),
      // 'params' => array_merge($_POST, ['date' => $date]),
			// ]);
				// $model=$model->offset($pagination->offset)
			// ->limit($pagination->limit)
	// ->orderBy(['date'=>SORT_DESC])
			// ->orderBy(['id'=>SORT_DESC])
			// ->where(['date'=>$date])
			// ->all();
			// }
		// else
		// {
			$model=TAction::find()
				->where(['class_id'=>12]);
				$pagination = new Pagination([
			'defaultPageSize'=>10,
			'totalCount'=>$model->count()
			]);
				$model=$model->offset($pagination->offset)
			->limit($pagination->limit)
			// ->orderBy(['date'=>SORT_DESC])
			->orderBy(['date'=>SORT_DESC])
				->where(['class_id'=>12])
			->all();
		// }

		$model_image=TActionImage::find()
		->all();
			  return $this->render('ourhistory',['model'=>$model,'model_image'=>$model_image,'pagination'=>$pagination]);
	}

  public function actionIntermus()
  {
    // if(Yii::$app->request->post())//если есть пост запрос, то находим ИД
      // {
        // $model=TAction::find();
        // $per=Yii::$app->request->post();
        // $date=$per['TAction']['date'];
        // $pagination = new Pagination([
      // 'defaultPageSize'=>10,
      // 'totalCount'=>$model->count(),
      // 'params' => array_merge($_POST, ['date' => $date]),
      // ]);
        // $model=$model->offset($pagination->offset)
      // ->limit($pagination->limit)
  // ->orderBy(['date'=>SORT_DESC])
      // ->orderBy(['id'=>SORT_DESC])
      // ->where(['date'=>$date])
      // ->all();
      // }
    // else
    // {
      $model=TAction::find()
        ->where(['class_id'=>13]);
        $pagination = new Pagination([
      'defaultPageSize'=>10,
      'totalCount'=>$model->count()
      ]);
        $model=$model->offset($pagination->offset)
      ->limit($pagination->limit)
      // ->orderBy(['date'=>SORT_DESC])
      ->orderBy(['date'=>SORT_DESC])
        ->where(['class_id'=>13])
      ->all();
    // }

    $model_image=TActionImage::find()
    ->all();
        return $this->render('intermus',['model'=>$model,'model_image'=>$model_image,'pagination'=>$pagination]);
  }

		public function actionGum()
	{
		// if(Yii::$app->request->post())//если есть пост запрос, то находим ИД
			// {
				// $model=TAction::find();
				// $per=Yii::$app->request->post();
				// $date=$per['TAction']['date'];
				// $pagination = new Pagination([
			// 'defaultPageSize'=>10,
			// 'totalCount'=>$model->count(),
      // 'params' => array_merge($_POST, ['date' => $date]),
			// ]);
				// $model=$model->offset($pagination->offset)
			// ->limit($pagination->limit)
	// ->orderBy(['date'=>SORT_DESC])
			// ->orderBy(['id'=>SORT_DESC])
			// ->where(['date'=>$date])
			// ->all();
			// }
		// else
		// {
			$model=TAction::find()
				->where(['class_id'=>10]);
				$pagination = new Pagination([
			'defaultPageSize'=>10,
			'totalCount'=>$model->count()
			]);
				$model=$model->offset($pagination->offset)
			->limit($pagination->limit)
			// ->orderBy(['date'=>SORT_DESC])
			->orderBy(['date'=>SORT_DESC],['id'=>SORT_DESC])
				->where(['class_id'=>10])
			->all();
		// }

		$model_image=TActionImage::find()
		->all();
			  return $this->render('gum',['model'=>$model,'model_image'=>$model_image,'pagination'=>$pagination]);
	}

			public function actionRus()
	{
		// if(Yii::$app->request->post())//если есть пост запрос, то находим ИД
			// {
				// $model=TAction::find();
				// $per=Yii::$app->request->post();
				// $date=$per['TAction']['date'];
				// $pagination = new Pagination([
			// 'defaultPageSize'=>10,
			// 'totalCount'=>$model->count(),
      // 'params' => array_merge($_POST, ['date' => $date]),
			// ]);
				// $model=$model->offset($pagination->offset)
			// ->limit($pagination->limit)
	// ->orderBy(['date'=>SORT_DESC])
			// ->orderBy(['id'=>SORT_DESC])
			// ->where(['date'=>$date])
			// ->all();
			// }
		// else
		// {
			$model=TAction::find()
				->where(['class_id'=>11]);
				$pagination = new Pagination([
			'defaultPageSize'=>10,
			'totalCount'=>$model->count()
			]);
				$model=$model->offset($pagination->offset)
			->limit($pagination->limit)
			// ->orderBy(['date'=>SORT_DESC])
			->orderBy(['date'=>SORT_DESC],['id'=>SORT_DESC])
				->where(['class_id'=>11])
			->all();
		// }

		$model_image=TActionImage::find()
		->all();
			  return $this->render('rus',['model'=>$model,'model_image'=>$model_image,'pagination'=>$pagination]);
	}

	public function actionShow()
	{
		// if(Yii::$app->request->post())//если есть пост запрос, то находим ИД
			// {
				// $model=TAction::find();
				// $per=Yii::$app->request->post();
				// $date=$per['TAction']['date'];
				// $pagination = new Pagination([
			// 'defaultPageSize'=>10,
			// 'totalCount'=>$model->count(),
      // 'params' => array_merge($_POST, ['date' => $date]),
			// ]);
				// $model=$model->offset($pagination->offset)
			// ->limit($pagination->limit)
	// ->orderBy(['date'=>SORT_DESC])
			// ->orderBy(['id'=>SORT_DESC])
			// ->where(['date'=>$date])
			// ->all();
			// }
		// else
		// {
			$model=TAction::find()
			->where(['class_id'=>1]);
				$pagination = new Pagination([
			'defaultPageSize'=>10,
			'totalCount'=>$model->count()
			]);
				$model=$model->offset($pagination->offset)
			->limit($pagination->limit)
			// ->orderBy(['date'=>SORT_DESC])
			->orderBy(['date'=>SORT_DESC],['id'=>SORT_DESC])
				->where(['class_id'=>1])
			->all();
		// }

		$model_image=TActionImage::find()
		->all();
			  return $this->render('show',['model'=>$model,'model_image'=>$model_image,'pagination'=>$pagination]);
	}

	public function actionArhiveshow()
	{
		// if(Yii::$app->request->post())//если есть пост запрос, то находим ИД
			// {
				// $model=TAction::find();
				// $per=Yii::$app->request->post();
				// $date=$per['TAction']['date'];
				// $pagination = new Pagination([
			// 'defaultPageSize'=>10,
			// 'totalCount'=>$model->count(),
      // 'params' => array_merge($_POST, ['date' => $date]),
			// ]);
				// $model=$model->offset($pagination->offset)
			// ->limit($pagination->limit)
	// ->orderBy(['date'=>SORT_DESC])
			// ->orderBy(['id'=>SORT_DESC])
			// ->where(['date'=>$date])
			// ->all();
			// }
		// else
		// {
			$model=TAction::find()
			->where(['class_id'=>1]);
				$pagination = new Pagination([
			'defaultPageSize'=>10,
			'totalCount'=>$model->count()
			]);
				$model=$model->offset($pagination->offset)
			->limit($pagination->limit)
			// ->orderBy(['date'=>SORT_DESC])
			->orderBy(['date'=>SORT_DESC],['id'=>SORT_DESC])
				->where(['class_id'=>1])
			->all();
		// }

		$model_image=TActionImage::find()
		->all();
			  return $this->render('arhiveshow',['model'=>$model,'model_image'=>$model_image,'pagination'=>$pagination]);
	}

	public function actionArhiveanons()
	{
		// if(Yii::$app->request->post())//если есть пост запрос, то находим ИД
			// {
				// $model=TAction::find();
				// $per=Yii::$app->request->post();
				// $date=$per['TAction']['date'];
				// $pagination = new Pagination([
			// 'defaultPageSize'=>10,
			// 'totalCount'=>$model->count(),
      // 'params' => array_merge($_POST, ['date' => $date]),
			// ]);
				// $model=$model->offset($pagination->offset)
			// ->limit($pagination->limit)
	// ->orderBy(['date'=>SORT_DESC])
			// ->orderBy(['id'=>SORT_DESC])
			// ->where(['date'=>$date])
			// ->all();
			// }
		// else
		// {
			$model=TAction::find()
			->where(['class_id'=>3]);
				$pagination = new Pagination([
			'defaultPageSize'=>10,
			'totalCount'=>$model->count()
			]);
				$model=$model->offset($pagination->offset)
			->limit($pagination->limit)
			// ->orderBy(['date'=>SORT_DESC])
			->orderBy(['date'=>SORT_DESC],['id'=>SORT_DESC])
				->where(['class_id'=>3])
			->all();
		// }

		$model_image=TActionImage::find()
		->all();
			  return $this->render('arhiveanons',['model'=>$model,'model_image'=>$model_image,'pagination'=>$pagination]);
	}

	public function actionZemlaki()
	{
		// if(Yii::$app->request->post())//если есть пост запрос, то находим ИД
			// {
				// $model=TAction::find();
				// $per=Yii::$app->request->post();
				// $date=$per['TAction']['date'];
				// $pagination = new Pagination([
			// 'defaultPageSize'=>10,
			// 'totalCount'=>$model->count(),
      // 'params' => array_merge($_POST, ['date' => $date]),
			// ]);
				// $model=$model->offset($pagination->offset)
			// ->limit($pagination->limit)
	// ->orderBy(['date'=>SORT_DESC])
			// ->orderBy(['id'=>SORT_DESC])
			// ->where(['date'=>$date])
			// ->all();
			// }
		// else
		// {
			$model=TAction::find()
			->where(['class_id'=>8]);
				$pagination = new Pagination([
			'defaultPageSize'=>10,
			'totalCount'=>$model->count()
			]);
				$model=$model->offset($pagination->offset)
			->limit($pagination->limit)
			// ->orderBy(['date'=>SORT_DESC])
			->orderBy(['date'=>SORT_DESC],['id'=>SORT_DESC])
				->where(['class_id'=>8])
			->all();
		// }

		$model_image=TActionImage::find()
		->all();
			  return $this->render('zemlaki',['model'=>$model,'model_image'=>$model_image,'pagination'=>$pagination]);
	}

	public function actionLandmarks()
	{
		// if(Yii::$app->request->post())//если есть пост запрос, то находим ИД
			// {
				// $model=TAction::find();
				// $per=Yii::$app->request->post();
				// $date=$per['TAction']['date'];
				// $pagination = new Pagination([
			// 'defaultPageSize'=>10,
			// 'totalCount'=>$model->count(),
      // 'params' => array_merge($_POST, ['date' => $date]),
			// ]);
				// $model=$model->offset($pagination->offset)
			// ->limit($pagination->limit)
	// ->orderBy(['date'=>SORT_DESC])
			// ->orderBy(['id'=>SORT_DESC])
			// ->where(['date'=>$date])
			// ->all();
			// }
		// else
		// {
			$model=TAction::find()
				->where(['class_id'=>9]);
				$pagination = new Pagination([
			'defaultPageSize'=>10,
			'totalCount'=>$model->count()
			]);
				$model=$model->offset($pagination->offset)
			->limit($pagination->limit)
			// ->orderBy(['date'=>SORT_DESC])
			->orderBy(['date'=>SORT_DESC],['id'=>SORT_DESC])
				->where(['class_id'=>9])
			->all();
		// }

		$model_image=TActionImage::find()
		->all();
			  return $this->render('landmarks',['model'=>$model,'model_image'=>$model_image,'pagination'=>$pagination]);
	}

	public function actionMain()
	{
		$model=TMainPage::find()
		->all();
		// $model_slider=TSlider::find()
		// ->all();

			$model_news=TAction::find()
			->limit(8)
			->orderBy(['date'=>SORT_DESC, 'id'=>SORT_DESC])
			//->orderBy(['id'=>SORT_DESC])
			//->where(['class_id'=>2])
			->all();

			$model_slider=TAction::find()
			//->orderBy(['date'=>SORT_DESC])
			->orderBy(['id'=>SORT_DESC])
			//->where(['class_id'=>2])
			->all();
			$model_news_image=TActionImage::find()
			->all();
		return $this->render('main',['model'=>$model, 'model_slider'=>$model_slider, 'model_news'=>$model_news, 'model_news_image'=>$model_news_image]);
	}


	public function actionItemActions($id=1)
	{
				$model=TAction::findOne($id);
				$model_image=TActionImage::find()
				->where(['action_id'=>$id])
		->all();
		//echo'<pre>'.print_r($model,true).'</pre>';
				 return $this->render('item-actions',['model'=>$model, 'model_image'=>$model_image]);
	}

		public function actionItemExpo($id=1)
	{
				$model=TExpo::findOne($id);
				$model_image=TExpoImage::find()
				->where(['expo_id'=>$id])
		->all();
		//echo'<pre>'.print_r($model,true).'</pre>';
				 return $this->render('item-expo',['model'=>$model, 'model_image'=>$model_image]);
	}

		// public function actionItemAnons($id=1)
	// {
				// $model=TAction::findOne($id);
				// $model_image=TActionImage::find()
				// ->where(['action_id'=>$id])
		// ->all();
		// // echo'<pre>'.print_r($model,true).'</pre>';
				 // return $this->render('item-anons',['model'=>$model, 'model_image'=>$model_image]);
	// }

	public function actionVestnik()
	{
				$model=TVestnik::find()
		->all();
		$model_image=TVestnikImage::find()
		->all();
		return $this->render('vestnik',['model'=>$model, 'model_image'=>$model_image]);
	}

		public function actionMemberDoneckLand()
	{
    $model=TMemberDoneckLand::find();
    $pagination = new Pagination([
    'defaultPageSize'=>20,
    'totalCount'=>$model->count()
    ]);
				if(Yii::$app->request->post())//если есть пост запрос
			{
$post=1;

				$per=Yii::$app->request->post();
				$type_id=$per['TTypePublication']['id'];

        $pagination = new Pagination([
        'defaultPageSize'=>20,
        'totalCount'=>$model->count(),
        'params' => array_merge($_POST, ['type_id' => $type_id]),
        ]);
			}
		else{
$post=0;

			}
		return $this->render('member-doneck-land',['pagination'=>$pagination, 'type_id'=>$type_id, 'post'=>$post]);
	}

		public function actionItemMemberDoneckLand($id=1)
	{
				$model=TMemberDoneckLand::findOne($id);
				$model_image=TMemberDoneckLandImage::find()
				->where(['member_id'=>$id])
		->all();
				 return $this->render('item-member-doneck-land',['model'=>$model, 'model_image'=>$model_image]);
	}

  public function actionAddAdmin() {
    $model = User::find()->where(['username' => 'admin'])->one();
    if (empty($model)) {
        $user = new User();
        $user->username = 'adminMuseum';
        $user->email = 'admin@yandex.ru';
        $user->setPassword('blEwozyFYuvDsr49mfGC43nfS');
        $user->generateAuthKey();
        if ($user->save()) {
            echo 'good';
        }
    }
}

public function actionVirtualmuseum()
{
          return $this->render('virtualmuseum');
}
public function actionVirtualmuseumwow()
{
          return $this->render('virtualmuseumwow');
}
}
