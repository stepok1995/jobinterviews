<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tPartners".
 *
 * @property int $id
 * @property string $name
 * @property string $adress
 * @property string $link
 */
class TPartners extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tPartners';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'adress', 'link'], 'required'],
            [['name', 'adress'], 'string', 'max' => 255],
            [['link'], 'string', 'max' => 512],
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
            'adress' => 'Adress',
            'link' => 'Link',
        ];
    }
}
