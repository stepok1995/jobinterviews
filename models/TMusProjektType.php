<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tMusProjektType".
 *
 * @property int $id
 * @property string $name
 *
 * @property TMusProjekt[] $tMusProjekts
 * @property TMusProjekt $id0
 */
class TMusProjektType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tMusProjektType';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
            [['id'], 'exist', 'skipOnError' => true, 'targetClass' => TMusProjekt::className(), 'targetAttribute' => ['id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Название цикла'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTMusProjekts()
    {
        return $this->hasMany(TMusProjekt::className(), ['project_type' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getId0()
    {
        return $this->hasOne(TMusProjekt::className(), ['id' => 'id']);
    }
}
