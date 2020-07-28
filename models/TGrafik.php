<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tGrafik".
 *
 * @property int $id
 * @property string $name
 * @property int $old_id
 * @property int $cost
 *
 * @property TOld $old
 */
class TGrafik extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tGrafik';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['text'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'text' => Yii::t('app', 'Текст')
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
}
