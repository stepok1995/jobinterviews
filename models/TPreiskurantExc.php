<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tPreiskurantExc".
 *
 * @property int $id
 * @property string $name
 * @property int $type_ex_id
 * @property int $cost
 *
 * @property TTypeExc $typeEx
 */
class TPreiskurantExc extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tPreiskurantExc';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'type_ex_id', 'cost'], 'required'],
            [['type_ex_id', 'cost'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['type_ex_id'], 'exist', 'skipOnError' => true, 'targetClass' => TTypeExc::className(), 'targetAttribute' => ['type_ex_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название услуги',
            'type_ex_id' => 'Для кого экскурсия',
            'cost' => 'Стоимость',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTypeEx()
    {
        return $this->hasOne(TTypeExc::className(), ['id' => 'type_ex_id']);
    }
}
