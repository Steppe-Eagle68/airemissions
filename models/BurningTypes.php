<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "burningtypes".
 *
 * @property int $id
 * @property string $name
 */
class BurningTypes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'burningtypes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }

    /**
     * Gets query for [[Boilers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBoiler()
    {
        return $this->hasMany(Boilers::className(), ['id_burningtype' => 'id']);
    }
}
