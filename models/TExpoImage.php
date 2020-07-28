<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tExpoImage".
 *
 * @property int $id
 * @property string $name
 * @property int $expo_id
 *
 * @property TExpo $expo
 */
class TExpoImage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tExpoImage';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'expo_id'], 'required'],
            [['expo_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['expo_id'], 'exist', 'skipOnError' => true, 'targetClass' => TExpo::className(), 'targetAttribute' => ['expo_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'expo_id' => 'Expo ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getExpo()
    {
        return $this->hasOne(TExpo::className(), ['id' => 'expo_id']);
    }
}
