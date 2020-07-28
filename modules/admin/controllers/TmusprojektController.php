<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\TMusProjekt;
use app\models\TMusProjektSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\UploadFormProjekt;
use app\models\TMPImage;
use yii\web\UploadedFile;
use app\models\TMusProjektType;


/**
 * TmusprojektController implements the CRUD actions for TMusProjekt model.
 */
class TmusprojektController extends Controller
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
     * Lists all TMusProjekt models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TMusProjektSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
		$model=TMusProjekt::find()
		->all();
		$model_Proj_Type=TMusProjektType::find()
		->all();
		$model_image=TMPImage::find()
		->all();
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
			'model'=>$model,'model_Proj_Type'=>$model_Proj_Type,'model_image'=>$model_image,
        ]);
    }

    /**
     * Displays a single TMusProjekt model.
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
     * Creates a new TMusProjekt model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
 public function actionCreate()
    {
        $model = new TMusProjekt();
		//$name = 'TExpoImage()';
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
						        $model_upload = new UploadFormProjekt();

            $model_upload->imageFiles = UploadedFile::getInstances($model_upload, 'imageFiles');
           if ($model_upload->upload('images/Projects/',$model->id)) {
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
     * Updates an existing TMusProjekt model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
$model_img=TMPImage::find()
->where(['project_id'=>$id])
->all();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
             $model_upload = new UploadFormProjekt();

            $model_upload->imageFiles = UploadedFile::getInstances($model_upload, 'imageFiles');
           if ($model_upload->upload('images/Projects/',$model->id)) {
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
            'model_img' => $model_img,
        ]);
    }

    /**
     * Deletes an existing TMusProjekt model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
				TMPImage::deleteAll(['project_id'=>$id]);
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
	
	 public function actionDeleteimg($id)
    {
		//$query= new Query();
//$query->		
			$model=TMPImage::findOne($id)->delete();
			  return $this->redirect(Yii::$app->request->referrer);
      
    }

    /**
     * Finds the TMusProjekt model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TMusProjekt the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TMusProjekt::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
