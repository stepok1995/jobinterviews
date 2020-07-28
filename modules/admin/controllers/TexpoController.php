<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\TExpo;
use app\models\TExpoSearch;
use app\models\TExpoImage;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\UploadForm;
use yii\web\UploadedFile;
use app\models\TFloorImage;

/**
 * TexpoController implements the CRUD actions for TExpo model.
 */
class TexpoController extends Controller
{
    /**
     * @inheritdoc
     */
	 	 	 public $layout="adminmain.php";
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
     * Lists all TExpo models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TExpoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
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
	
    /**
     * Displays a single TExpo model.
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
     * Creates a new TExpo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TExpo();
		//$name = 'TExpoImage()';
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
						        $model_upload = new UploadForm();

            $model_upload->imageFiles = UploadedFile::getInstances($model_upload, 'imageFiles');
           if ($model_upload->upload('images/Ekspozition/',$model->id)) {
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
        ]);
    }

    /**
     * Updates an existing TExpo model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
          $model = $this->findModel($id);
$expo_image=TExpoImage::find()
									->where(['expo_id'=>$id])
									->all();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
			 $model_upload = new UploadForm();

            $model_upload->imageFiles = UploadedFile::getInstances($model_upload, 'imageFiles');
           if ($model_upload->upload('images/Ekspozition/',$model->id)) {
                // file is uploaded successfully
			//return 'yes';
          }
		else{
			//	return 'noooo';
			}
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'expo_image' => $expo_image,
        ]);
    }
	
	 public function actionDeleteimg($id)
    {
		//$query= new Query();
//$query->		
			$model=TExpoImage::findOne($id)->delete();
			  return $this->redirect(Yii::$app->request->referrer);
      
    }

    /**
     * Deletes an existing TExpo model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
		TExpoImage::deleteAll(['expo_id'=>$id]);
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TExpo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TExpo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TExpo::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
