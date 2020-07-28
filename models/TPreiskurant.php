<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tPreiskurant".
 *
 * @property int $id
 * @property string $name
 * @property int $old_id
 * @property int $cost
 *
 * @property TOld $old
 */
class TPreiskurant extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tPreiskurant';
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
