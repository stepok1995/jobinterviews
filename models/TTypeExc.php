<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tTypeExc".
 *
 * @property int $id
 * @property string $name
 *
 * @property TPreiskurantExc[] $tPreiskurantExcs
 */
class TTypeExc extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tTypeExc';
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
            'name' => 'Название',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTPreiskurantExcs()
    {
        return $this->hasMany(TPreiskurantExc::className(), ['type_ex_id' => 'id']);
    }
}
