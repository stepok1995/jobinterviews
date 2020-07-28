<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tSlider".
 *
 * @property int $id
 * @property string $name
 */
class TSlider extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tSlider';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            //[['name'], 'required'],
            [['name'], 'string', 'max' => 255],
            [['title'], 'string', 'max' => 255],
            [['link'], 'string', 'max' => 255],
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
            'title' => 'Заголовок',
            'link' => 'Ссылка на новость',
        ];
    }
}
