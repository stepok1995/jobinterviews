<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tActionClass".
 *
 * @property int $id
 * @property string $name
 * @property int $action_id
 *
 * @property TAction $action
 */
class TActionClass extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tActionClass';
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
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTActionClass()
    {
        return $this->hasMany(TActionClass::className(), ['class_id' => 'id']);
    }
}
