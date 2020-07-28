<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tAfisha".
 *
 * @property int $id
 * @property string $title
 * @property int $afisha_type_id
 *
 * @property TAfishaType $afishaType
 * @property TAfishaImage[] $tAfishaImages
 */
class TAfisha extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tAfisha';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'afisha_type_id'], 'required'],
            [['afisha_type_id'], 'integer'],
            [['title'], 'string', 'max' => 512],
            [['afisha_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => TAfishaType::className(), 'targetAttribute' => ['afisha_type_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'afisha_type_id' => 'Afisha Type ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAfishaType()
    {
        return $this->hasOne(TAfishaType::className(), ['id' => 'afisha_type_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTAfishaImages()
    {
        return $this->hasMany(TAfishaImage::className(), ['afisha_id' => 'id']);
    }
}
