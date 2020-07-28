<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\TAction;
use app\models\TActionImage;
use app\models\TActionSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\UploadFormAction;
use app\models\UploadActionPreview;
use yii\web\UploadedFile;
use yii\data\Pagination;

/**
 * TactionController implements the CRUD actions for TAction model.
 */
class TactionController extends Controller
{
    /**
     * @inheritdoc
     */
	 	 	 public $layout="adminmain.php";
			    public $enableCsrfValidation = false;
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all TAction models.
     * @return mixed
     */
    public function actionIndex()
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
						// ->where(['class_id'=>2])
						// ->andWhere(['topnews'=>0])
						->all();
						$model_image=TActionImage::find()
					->all();
        $searchModel = new TActionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
			'model'=>$model,
			'model_image'=>$model_image,
			'pagination'=>$pagination
        ]);
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
			->orderBy('id', 'date')
				->where(['class_id'=>3])
			->all();
		// }

		$model_image=TActionImage::find()
		->all();
			  return $this->render('anons',['model'=>$model,'model_image'=>$model_image,'pagination'=>$pagination]);
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

public function actionItemActions($id=1)
	{
				$model=TAction::findOne($id);
				$model_image=TActionImage::find()
				->where(['action_id'=>$id])
		->all();
		//echo'<pre>'.print_r($model,true).'</pre>';
				 return $this->render('item-actions',['model'=>$model, 'model_image'=>$model_image]);
	}
    /**
     * Displays a single TAction model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new TAction model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
 public function actionCreate()
    {
        $model = new TAction();
		//$name = 'TExpoImage()';
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
						        $model_upload = new UploadFormAction();
						        $model_upload_preview = new UploadActionPreview();

			$model_upload_preview->imageFiles = UploadedFile::getInstances($model_upload_preview, 'imageFiles');
			if ($model_upload_preview->upload('images/action/',$model->id)) {
                // file is uploaded successfully
			//return 'yes';
          }
		else{
			//	return 'noooo';
			}
			 $model_upload->imageFiles = UploadedFile::getInstances($model_upload, 'imageFiles');
		           if ($model_upload->upload('images/action/',$model->id)) {
                // file is uploaded successfully
			//return 'yes';
          }
		else{
			//	return 'noooo';
			}
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
			   'hour' => $hour,
        ]);
    }

    /**
     * Updates an existing TAction model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
$model_img=TActionImage::find()
->where(['action_id'=>$id])
->all();
$model_img_preview=TAction::findOne($id);
		//$name = 'TExpoImage()';
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
						        $model_upload = new UploadFormAction();
						        $model_upload_preview = new UploadActionPreview();

			$model_upload_preview->imageFiles = UploadedFile::getInstances($model_upload_preview, 'imageFiles');
			if ($model_upload_preview->upload('images/action/',$model->id)) {
                // file is uploaded successfully
			//return 'yes';
          }
		else{
			//	return 'noooo';
			}
			 $model_upload->imageFiles = UploadedFile::getInstances($model_upload, 'imageFiles');
		           if ($model_upload->upload('images/action/',$model->id)) {
                // file is uploaded successfully
			//return 'yes';
          }
		else{
			//	return 'noooo';
			}
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model, 'hour' => $hour, 'model_img'=>$model_img, 'model_img_preview'=>$model_img_preview,
        ]);
    }

    /**
     * Deletes an existing TAction model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */

	     public function actionDeleteimg($id)
    {
		//$query= new Query();
//$query->
			$model=TActionImage::findOne($id)->delete();
			  return $this->redirect(Yii::$app->request->referrer);

    }

    public function actionDelete($id)
    {
			TActionImage::deleteAll(['action_id'=>$id]);
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }



    /**
     * Finds the TAction model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TAction the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TAction::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
