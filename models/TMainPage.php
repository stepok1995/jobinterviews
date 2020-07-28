<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tMainPage".
 *
 * @property int $id
 * @property string $title
 * @property string $link
 * @property string $image
 */
class TMainPage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tMainPage';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'link'], 'required'],
            [['title', 'link', 'image'], 'string', 'max' => 512],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Title'),
            'link' => Yii::t('app', 'Link'),
            'image' => Yii::t('app', 'Image'),
        ];
    }
}
