<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "fuel2burning".
 *
 * @property int $id
 * @property int $id_fueltype
 * @property int $id_burningtype
 * @property float $EmissionCO
 * @property float $EmissionNO
 * @property float $mechanical_shortage
 *
 * @property Burningtypes $burningtype
 * @property Fueltypes $fueltype
 */
class Fuel2BurnigSearch extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'fuel2burning';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_fueltype', 'id_burningtype', 'EmissionCO', 'EmissionNO', 'mechanical_shortage'], 'required'],
            [['id_fueltype', 'id_burningtype'], 'integer'],
            [['EmissionCO', 'EmissionNO', 'mechanical_shortage'], 'number'],
            [['id_burningtype'], 'exist', 'skipOnError' => true, 'targetClass' => Burningtypes::className(), 'targetAttribute' => ['id_burningtype' => 'id']],
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
            'id_burningtype' => 'Id Burningtype',
            'EmissionCO' => 'Emission Co',
            'EmissionNO' => 'Emission No',
            'mechanical_shortage' => 'Mechanical Shortage',
        ];
    }

    /**
     * Gets query for [[Burningtype]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBurningtype()
    {
        return $this->hasOne(Burningtypes::className(), ['id' => 'id_burningtype']);
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
