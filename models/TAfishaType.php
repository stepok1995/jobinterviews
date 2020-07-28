<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tAfishaType".
 *
 * @property int $id
 * @property string $name
 *
 * @property TAfisha[] $tAfishas
 */
class TAfishaType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tAfishaType';
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
            'name' => 'Название типа',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTAfishas()
    {
        return $this->hasMany(TAfisha::className(), ['afisha_type_id' => 'id']);
    }
}
