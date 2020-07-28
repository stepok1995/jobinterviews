<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\TAnons;
use app\models\TAnonsImage;
use app\models\TAnonsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\UploadFormAnons;
use app\models\UploadAnonsPreview;
use yii\web\UploadedFile;

/**
 * TanonsController implements the CRUD actions for TAnons model.
 */
class TanonsController extends Controller
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
     * Lists all TAnons models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TAnonsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TAnons model.
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
     * Creates a new TAnons model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
 public function actionCreate()
    {
        $model = new TAnons();
		//$name = 'TExpoImage()';
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
						        $model_upload = new UploadFormAnons();
						        $model_upload_preview = new UploadAnonsPreview();
           
			$model_upload_preview->imageFiles = UploadedFile::getInstances($model_upload_preview, 'imageFiles');
			if ($model_upload_preview->upload('images/',$model->id)) {
                // file is uploaded successfully
			//return 'yes';
          }
		else{
			//	return 'noooo';
			}
			 $model_upload->imageFiles = UploadedFile::getInstances($model_upload, 'imageFiles');
		           if ($model_upload->upload('images/',$model->id)) {
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
     * Updates an existing TAnons model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
$model_img=TAnonsImage::find()
->where(['anons_id'=>$id])
->all();
$model_img_preview=TAnons::findOne($id);
		//$name = 'TExpoImage()';
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
						        $model_upload = new UploadFormAnons();
						        $model_upload_preview = new UploadAnonsPreview();
           
			$model_upload_preview->imageFiles = UploadedFile::getInstances($model_upload_preview, 'imageFiles');
			if ($model_upload_preview->upload('images/',$model->id)) {
                // file is uploaded successfully
			//return 'yes';
          }
		else{
			//	return 'noooo';
			}
			 $model_upload->imageFiles = UploadedFile::getInstances($model_upload, 'imageFiles');
		           if ($model_upload->upload('images/',$model->id)) {
                // file is uploaded successfully
			//return 'yes';
          }
		else{
			//	return 'noooo';
			}
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model, 'model_img'=>$model_img, 'model_img_preview'=>$model_img_preview,
        ]);
    }

    /**
     * Deletes an existing Anons model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
			TAnonsImage::deleteAll(['anons_id'=>$id]);
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
	
	

    /**
     * Finds the TAnons model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TAnons the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TAnons::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
