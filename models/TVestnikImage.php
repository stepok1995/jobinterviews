<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tVestnikImage".
 *
 * @property int $id
 * @property string $name
 * @property int $vestnik_id
 *
 * @property TVestnik $vestnik
 */
class TVestnikImage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tVestnikImage';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [[/*'name',*/ 'vestnik_id'], 'required'],
            [['vestnik_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['vestnik_id'], 'exist', 'skipOnError' => true, 'targetClass' => TVestnik::className(), 'targetAttribute' => ['vestnik_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'vestnik_id' => 'Vestnik ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVestnik()
    {
        return $this->hasOne(TVestnik::className(), ['id' => 'vestnik_id']);
    }
}
