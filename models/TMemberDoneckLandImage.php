<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tMemberDoneckLandImage".
 *
 * @property int $id
 * @property string $name
 * @property string $image_text
 * @property int $member_id
 *
 * @property TMemberDoneckLand $member
 */
class TMemberDoneckLandImage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tMemberDoneckLandImage';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [[/*'name', 'image_text',*/ 'member_id'], 'required'],
            [['image_text'], 'string'],
            [['member_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['member_id'], 'exist', 'skipOnError' => true, 'targetClass' => TMemberDoneckLand::className(), 'targetAttribute' => ['member_id' => 'id']],
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
            'image_text' => Yii::t('app', 'Image Text'),
            'member_id' => Yii::t('app', 'Member ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMember()
    {
        return $this->hasOne(TMemberDoneckLand::className(), ['id' => 'member_id']);
    }
}
