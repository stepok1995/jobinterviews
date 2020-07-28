<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\TGrafik;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TwowimageController implements the CRUD actions for TWowImage model.
 */
class TgrafikController extends Controller
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
     * Lists all TWowImage models.
     * @return mixed
     */
    public function actionIndex()
    {
       // $searchModel = new TWowImageSearch();
       // $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
$model=TGrafik::find()
->all();
        return $this->render('index', [
            //'searchModel' => $searchModel,
           // 'dataProvider' => $dataProvider,
			'model'=>$model,
        ]);
    }

    /**
     * Displays a single TWowImage model.
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
     * Creates a new TWowImage model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
   public function actionCreate()
    {
        $model = new TGrafik();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
						       // $model_upload = new UploadFormWowFile();

         //  $model_upload->imageFiles = UploadedFile::getInstances($model_upload, 'imageFiles');
          // if ($model_upload->upload('images/slider/')) {
                // file is uploaded successfully
			//return 'yes';
         // }
		//else{
			//	return 'noooo';
		//	}
            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing TWowImage model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing TWowImage model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TWowImage model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TWowImage the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TGrafik::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
