<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tFloorImage".
 *
 * @property int $id
 * @property string $name
 * @property int $floor_id
 *
 * @property TFloor $floor
 */
class TFloorImage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tFloorImage';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [[/*'name',*/ 'floor_id'], 'required'],
            [['floor_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['floor_id'], 'exist', 'skipOnError' => true, 'targetClass' => TFloor::className(), 'targetAttribute' => ['floor_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Путь к картинке',
            'floor_id' => 'Этаж №',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFloor()
    {
        return $this->hasOne(TFloor::className(), ['id' => 'floor_id']);
    }
}
