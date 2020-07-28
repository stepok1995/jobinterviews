<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tExpo".
 *
 * @property int $id
 * @property string $title
 * @property string $text
 * @property int $floor_id
 *
 * @property TFloor $floor
 * @property TExpoImage[] $tExpoImages
 */
class TExpo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tExpo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'text', 'floor_id'], 'required'],
            [['text'], 'string'],
            [['floor_id'], 'integer'],
            [['title'], 'string', 'max' => 255],
            [['floor_id'], 'exist', 'skipOnError' => true, 'targetClass' => TFloor::className(), 'targetAttribute' => ['floor_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Заголовок'),
            'text' => Yii::t('app', 'Описание экспозиции'),
            'floor_id' => Yii::t('app', 'Этаж №'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFloor()
    {
        return $this->hasOne(TFloor::className(), ['id' => 'floor_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTExpoImages()
    {
        return $this->hasMany(TExpoImage::className(), ['expo_id' => 'id']);
    }
}
