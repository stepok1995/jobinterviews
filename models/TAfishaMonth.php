<?php

namespace app\models;
use yii\web\UploadedFile;
use yii\base\Model;
use Yii;
use yii\validators\FileValidator;

/**
 * This is the model class for table "tAfishaMonth".
 *
 * @property int $id
 * @property string $name
 */
class TAfishaMonth extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tAfishaMonth';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
           // [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'путь к картинке'),
        ];
    }
}
