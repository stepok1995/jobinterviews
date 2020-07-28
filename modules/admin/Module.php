<?php

namespace app\modules\admin;
use app\models\TAutentification;

/**
 * admin module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
	 	
    public $controllerNamespace = 'app\modules\admin\controllers';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
	
	public function behaviors(){
 return [
 'access' => [
 'class' => \yii\filters\AccessControl::className(),
 'rules' => [
 [
 'allow' => true,
 'roles' => ['@'],
 ],
 ],
 ],
    'verbs' => [
                'class' => \yii\filters\VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
 ];
}
}
