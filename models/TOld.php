<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tOld".
 *
 * @property int $id
 * @property string $name
 *
 * @property TPreiskurant[] $tPreiskurants
 */
class TOld extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tOld';
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
            'name' => 'Наименование',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTPreiskurants()
    {
        return $this->hasMany(TPreiskurant::className(), ['old_id' => 'id']);
    }
}
