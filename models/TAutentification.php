<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tAutentification".
 *
 * @property int $id
 * @property string $username
 * @property string $password
 */
class TAutentification extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
	 public $user = false;
    public static function tableName()
    {
        return 'tAutentification';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'password'], 'required'],
            [['username', 'password'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'username' => Yii::t('app', 'Username'),
            'password' => Yii::t('app', 'Password'),
        ];
    }
	
	    public static function findIdentity($id)
    {
        return static::findOne($id);
    }
    
    public function getId()
    {
        return $this->id;
    }
    
    public static function 
    findIdentityByAccessToken($token, $type = null)
    {
      
    }
    
    public function getAuthKey()
    {
       
    }

    public function validateAuthKey($authKey)
    {
      
    }
	
	public function login()
    {
        if ($this->validate()) {
        return Yii::$app->user->login($this->getUser());
        }
    }
	
	 public function getUser()
 {
   if ($this->user === false) {
 $this->user = TAutentification::findOne(['username'=>$this->username, 
                               'password'=>$this->pass]);
   }
        
  return $this->user;
}

public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            if(!$this->getUser())
            {
           $this->addError($attribute, 'Неверный пароль');
            } 
        }
    }
}
