<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tMemberDoneckLand".
 *
 * @property int $id
 * @property string $title
 * @property string $text
 * @property int $type_id
 *
 * @property TTypePublication $type
 * @property TMemberDoneckLandImage[] $tMemberDoneckLandImages
 */
class TMemberDoneckLand extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tMemberDoneckLand';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'text', 'type_id'], 'required'],
            [['text'], 'string'],
            [['type_id'], 'integer'],
            [['title'], 'string', 'max' => 512],
            [['type_id'], 'exist', 'skipOnError' => true, 'targetClass' => TTypePublication::className(), 'targetAttribute' => ['type_id' => 'id']],
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
            'text' => Yii::t('app', 'Текст статьи'),
            'type_id' => Yii::t('app', 'Тип статьи'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getType()
    {
        return $this->hasOne(TTypePublication::className(), ['id' => 'type_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTMemberDoneckLandImages()
    {
        return $this->hasMany(TMemberDoneckLandImage::className(), ['member_id' => 'id']);
    }
}
