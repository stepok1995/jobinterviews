<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tMusProjekt".
 *
 * @property int $id
 * @property string $name
 * @property string $text
 * @property int $count_of_group
 * @property double $time_to_lesson
 * @property int $child_old
 * @property int $project_type
 *
 * @property TMPImage[] $tMPImages
 * @property TMusProjektType $projectType
 * @property TMusProjektType $tMusProjektType
 */
class TMusProjekt extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tMusProjekt';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'text', 'project_type'], 'required'],
            [['text'], 'string'],
            [['project_type'], 'integer'], 
            [['name'], 'string', 'max' => 255],
            [['project_type'], 'exist', 'skipOnError' => true, 'targetClass' => TMusProjektType::className(), 'targetAttribute' => ['project_type' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Название проекта'),
            'text' => Yii::t('app', 'Опсиание проекта'),
            'project_type' => Yii::t('app', 'Категория проекта'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTMPImages()
    {
        return $this->hasMany(TMPImage::className(), ['project_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProjectType()
    {
        return $this->hasOne(TMusProjektType::className(), ['id' => 'project_type']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTMusProjektType()
    {
        return $this->hasOne(TMusProjektType::className(), ['id' => 'id']);
    }
}
