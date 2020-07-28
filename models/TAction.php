<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tAction".
 *
 * @property int $id
 * @property string $date
 * @property string $title
 * @property string $text
 *
 * @property TActionImage[] $tActionImages
 */
class TAction extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tAction';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'text'], 'required'],
            [['date'], 'default', 'value' => null],
            [['text'], 'string'],
            [['title'], 'string', 'max' => 255],
			   [['text_preview'], 'string'],
			   [['img_preview'], 'string', 'max' => 255],
			         [['topnews'], 'boolean'],
			         [['arhive'], 'boolean'],
					 [['datetime'], 'default', 'value' => null],
			         [['class_id'], 'integer'],
					 [['class_id'], 'exist', 'skipOnError' => true, 'targetClass' => TActionClass::className(), 'targetAttribute' => ['class_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'date' => Yii::t('app', 'Дата'),
            'title' => Yii::t('app', 'Заголовок'),
            'text' => Yii::t('app', 'Текст новости'),
			'text_preview' => Yii::t('app', 'Превью текса'),
			'img_preview' => Yii::t('app', 'картинка-превью'),
			
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTActionImages()
    {
        return $this->hasMany(TActionImage::className(), ['action_id' => 'id']);
    }

    public function getTActionClass()
    {
        return $this->hasOne(TActionClass::className(), ['id' => 'class_id']);
    }

public function getTActionClassName()
{
    $parent = $this->parent;
 
    return $parent ? $parent->name : '';
}
}
