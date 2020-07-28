<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tVestnik".
 *
 * @property int $id
 * @property string $text
 * @property string $file_path
 *
 * @property TVestnikImage[] $tVestnikImages
 */
class TVestnik extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tVestnik';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['text'/*, 'file_path'*/], 'required'],
            [['text'], 'string'],
            [['file_path'], 'string', 'max' => 512],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'text' => 'Описание печатного издания',
            'file_path' => 'Путь к файлу',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTVestnikImages()
    {
        return $this->hasMany(TVestnikImage::className(), ['vestnik_id' => 'id']);
    }
}
