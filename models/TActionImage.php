<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tActionImage".
 *
 * @property int $id
 * @property string $name
 * @property int $action_id
 *
 * @property TAction $action
 */
class TActionImage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tActionImage';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [[/*'name',*/ 'action_id'], 'required'],
            [['action_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['action_id'], 'exist', 'skipOnError' => true, 'targetClass' => TAction::className(), 'targetAttribute' => ['action_id' => 'id']],
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
            'action_id' => Yii::t('app', 'Action ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAction()
    {
        return $this->hasOne(TAction::className(), ['id' => 'action_id']);
    }

    public function getActionName()
    {
        $action = $this->action;

        return $action ? $action->title : '';
    }
}
