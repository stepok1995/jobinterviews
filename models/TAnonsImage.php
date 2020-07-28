<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tAnonsImage".
 *
 * @property int $id
 * @property string $name
 * @property int $anons_id
 *
 * @property TAnons $anons
 */
class TAnonsImage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tAnonsImage';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [[/*'name',*/ 'anons_id'], 'required'],
            [['anons_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['anons_id'], 'exist', 'skipOnError' => true, 'targetClass' => TAnons::className(), 'targetAttribute' => ['anons_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'anons_id' => Yii::t('app', 'Anons ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAnons()
    {
        return $this->hasOne(TAnons::className(), ['id' => 'anons_id']);
    }

    public function getAnonsName()
    {
        $anons = $this->anons;

        return $anons ? $anons->title : '';
    }
}
