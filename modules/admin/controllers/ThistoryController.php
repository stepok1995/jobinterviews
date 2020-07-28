<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\THistory;
use app\models\THistoryImage;
use app\models\THistorySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\UploadFormHistory;
use yii\web\UploadedFile;

/**
 * ThistoryController implements the CRUD actions for THistory model.
 */
class ThistoryController extends Controller
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
     * Lists all THistory models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new THistorySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
		$model=THistory::find()
		->orderBy('flag')
		->all();
				$model_image=THistoryImage::find()
					->all();
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
			'model'=>$model,
			'model_image'=>$model_image,
        ]);
    }

 public function actionDeleteimg($id)
    {
		//$query= new Query();
//$query->		
			$model=THistoryImage::findOne($id)->delete();
			  return $this->redirect(Yii::$app->request->referrer);
      
    }
	
    /**
     * Displays a single THistory model.
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
     * Creates a new THistory model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
 public function actionCreate()
    {
        $model = new THistory();
		//$name = 'TExpoImage()';
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
						        $model_upload = new UploadFormHistory();

            $model_upload->imageFiles = UploadedFile::getInstances($model_upload, 'imageFiles');
           if ($model_upload->upload('images/history/',$model->id)) {
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
     * Updates an existing THistory model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
     public function actionUpdate($id)
    {
        $model = $this->findModel($id);
	$history_image=THistoryImage::find()
									->where(['history_id'=>$id])
									->all();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
			 $model_upload = new UploadFormHistory();

            $model_upload->imageFiles = UploadedFile::getInstances($model_upload, 'imageFiles');
           if ($model_upload->upload('images/history/',$model->id)) {
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
            'history_image' => $history_image,
        ]);
    }

    /**
     * Deletes an existing THistory model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
			THistoryImage::deleteAll(['history_id'=>$id]);
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the THistory model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return THistory the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = THistory::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
