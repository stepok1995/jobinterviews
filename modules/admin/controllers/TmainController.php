<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\TMainPage;
use app\models\TMainPageSearch;
use app\models\UploadFormMain;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * TmainController implements the CRUD actions for TMainPage model.
 */
class TmainController extends Controller
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
     * Lists all TMainPage models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TMainPageSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TMainPage model.
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
     * Creates a new TMainPage model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
 public function actionCreate()
    {
        $model = new TMainPage();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
						        $model_upload = new UploadFormMain();

            $model_upload->imageFiles = UploadedFile::getInstances($model_upload, 'imageFiles');
           if ($model_upload->upload('images/main/',$model->id)) {
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
     * Updates an existing TMainPage model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
			 $model_upload = new UploadFormMain();

            $model_upload->imageFiles = UploadedFile::getInstances($model_upload, 'imageFiles');
           if ($model_upload->upload('images/main/',$model->id)) {
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
        ]);
    }

    /**
     * Deletes an existing TMainPage model.
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
     * Finds the TMainPage model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TMainPage the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TMainPage::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
