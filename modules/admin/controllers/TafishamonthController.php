<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\TAfishaMonth;
use app\models\TAfishaMonthSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\UploadFormAM;
use yii\web\UploadedFile;

/**
 * TafishamonthController implements the CRUD actions for TAfishaMonth model.
 */
class TafishamonthController extends Controller
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
     * Lists all TAfishaMonth models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TAfishaMonthSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TAfishaMonth model.
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
     * Creates a new TAfishaMonth model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TAfishaMonth();

        if (/*$model->load(*/Yii::$app->request->post()/*) && $model->save()*/) {
						        $model_upload = new UploadFormAM();

            $model_upload->imageFiles = UploadedFile::getInstances($model_upload, 'imageFiles');
           if ($model_upload->upload('images/afisha/')) {
                // file is uploaded successfully
			//return 'yes';
          }
		else{
			//	return 'noooo';
			}
            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing TAfishaMonth model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
 public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if (Yii::$app->request->post() && $model->save()){
			//return 'yes';
			 $model_upload = new UploadFormAM();

            $model_upload->imageFiles = UploadedFile::getInstances($model_upload, 'imageFiles');
           if ($model_upload->upload('images/afisha/',$model->id)) {
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
     * Deletes an existing TAfishaMonth model.
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
     * Finds the TAfishaMonth model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TAfishaMonth the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TAfishaMonth::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
