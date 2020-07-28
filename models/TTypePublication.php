<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tTypePublication".
 *
 * @property int $id
 * @property string $name
 *
 * @property TMemberDoneckLand[] $tMemberDoneckLands
 */
class TTypePublication extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tTypePublication';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTMemberDoneckLands()
    {
        return $this->hasMany(TMemberDoneckLand::className(), ['type_id' => 'id']);
    }
}
