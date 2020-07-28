<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tHistoryImage".
 *
 * @property int $id
 * @property string $name
 * @property int $history_id
 *
 * @property THistory $history
 */
class THistoryImage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tHistoryImage';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'history_id'], 'required'],
            [['history_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['history_id'], 'exist', 'skipOnError' => true, 'targetClass' => THistory::className(), 'targetAttribute' => ['history_id' => 'id']],
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
            'history_id' => 'History ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHistory()
    {
        return $this->hasOne(THistory::className(), ['id' => 'history_id']);
    }
}
