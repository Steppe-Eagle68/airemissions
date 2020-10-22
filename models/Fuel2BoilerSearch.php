<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "fuel2boiler".
 *
 * @property int $id
 * @property int $id_fueltype
 * @property int $id_boiler
 * @property float $EmissionCO
 * @property float $EmissionNO
 * @property float $mechanical_shortage
 *
 * @property Boilers $boiler
 * @property Fueltypes $fueltype
 */
class Fuel2BoilerSearch extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'fuel2boiler';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_fueltype', 'id_boiler', 'EmissionCO', 'EmissionNO', 'mechanical_shortage'], 'required'],
            [['id_fueltype', 'id_boiler'], 'integer'],
            [['EmissionCO', 'EmissionNO', 'mechanical_shortage'], 'number'],
            [['id_boiler'], 'exist', 'skipOnError' => true, 'targetClass' => Boilers::className(), 'targetAttribute' => ['id_boiler' => 'id']],
            [['id_fueltype'], 'exist', 'skipOnError' => true, 'targetClass' => Fueltypes::className(), 'targetAttribute' => ['id_fueltype' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_fueltype' => 'Id Fueltype',
            'id_boiler' => 'Id Boiler',
            'EmissionCO' => 'Emission Co',
            'EmissionNO' => 'Emission No',
            'mechanical_shortage' => 'Mechanical Shortage',
        ];
    }

    /**
     * Gets query for [[Boiler]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBoiler()
    {
        return $this->hasOne(Boilers::className(), ['id' => 'id_boiler']);
    }

    /**
     * Gets query for [[Fueltype]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFueltype()
    {
        return $this->hasOne(Fueltypes::className(), ['id' => 'id_fueltype']);
    }
}
