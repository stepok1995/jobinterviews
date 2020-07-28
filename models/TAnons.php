<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tAnons".
 *
 * @property int $id
 * @property string $title
 * @property string $text
 *
 * @property TAnonsImage[] $tAnonsImages
 */
class TAnons extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tAnons';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'text'], 'required'],
         
            [['text'], 'string'],
            [['title'], 'string', 'max' => 255],
			   [['text_preview'], 'string'],
			   [['img_preview'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Заголовок'),
            'text' => Yii::t('app', 'Текст анонса'),
			'text_preview' => Yii::t('app', 'Превью текста'),
			'img_preview' => Yii::t('app', 'картинка-превью'),
			
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTAnonsImages()
    {
        return $this->hasMany(TAnonsImage::className(), ['anons_id' => 'id']);
    }




}
