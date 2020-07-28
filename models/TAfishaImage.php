<?php

namespace app\models;
use yii\base\Model;
use yii\web\UploadedFile;
use Yii;

/**
 * This is the model class for table "tAfishaImage".
 *
 * @property int $id
 * @property string $name
 * @property int $afisha_type_id
 *
 * @property TAfishaType $afishaType
 */
class TAfishaImage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tAfishaImage';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [[/*'name',*/ 'afisha_type_id'], 'required'],
            [['afisha_type_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['afisha_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => TAfishaType::className(), 'targetAttribute' => ['afisha_type_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Путь к картинке'),
            'afisha_type_id' => Yii::t('app', 'Тип афиши'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAfishaType()
    {
        return $this->hasOne(TAfishaType::className(), ['id' => 'afisha_type_id']);
    }
}



