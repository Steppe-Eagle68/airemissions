<?php

namespace app\models;

use Yii;
use app\models\Fuel2Boiler;
use app\models\BurningTypes;

/**
 * This is the model class for table "boilers".
 *
 * @property int $id
 * @property string $name
 */
class Boilers extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'boilers';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
            [['id_burningtype'], 'integer'],
            [['id_burningtype'], 'exist', 'skipOnError' => true, 'targetClass' => BurningTypes::className(), 'targetAttribute' => ['id_burningtype' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('main','ID'),
            'name' => Yii::t('main','Name'),
            'id_burningtype' => Yii::t('main','Burning type'),
        ];
    }

    /**
     * Gets query for [[Boiler]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFuel2boiler()
    {
        return $this->hasMany(Fuel2Boiler::className(), ['id_boiler' => 'id']);
    }

    /**
     * Gets query for [[Fueltype]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBurningtype()
    {
        return $this->hasOne(BurningTypes::className(), ['id' => 'id_burningtype']);
    }


}
