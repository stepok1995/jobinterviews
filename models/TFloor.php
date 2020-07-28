<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tFloor".
 *
 * @property int $id
 * @property string $name
 *
 * @property TExpo[] $tExpos
 * @property TFloorImage[] $tFloorImages
 */
class TFloor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tFloor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTExpos()
    {
        return $this->hasMany(TExpo::className(), ['floor_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTFloorImages()
    {
        return $this->hasMany(TFloorImage::className(), ['floor_id' => 'id']);
    }
}
