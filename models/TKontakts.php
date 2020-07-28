<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tWowImage".
 *
 * @property int $id
 * @property string $name
 */
class TKontakts extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tKontakts';
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
            'text' => Yii::t('app', 'Текст'),
        ];
    }
}
