<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "fuels".
 *
 * @property int $id
 * @property string $name
 * @property float|null $carbon
 * @property float|null $hydrogen
 * @property float|null $sulfur
 * @property float|null $ash
 * @property float|null $nitrogen
 * @property float|null $methane
 * @property float|null $oxygen
 * @property float|null $lower_combustion_heat
 */
class Fuels extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'fuels';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'carbon', 'hydrogen', 'sulfur', 'ash', 'nitrogen', 'methane', 'oxygen', 'lower_combustion_heat', 'id_fueltype'], 'required'],
            [['carbon', 'hydrogen', 'sulfur', 'ash', 'nitrogen', 'methane', 'oxygen'], 'number', 'min' => 0, 'max' => 100],
            [['lower_combustion_heat', 'id_fueltype'], 'number'],
            [['name'], 'string', 'max' => 50],
            [['id_fueltype'], 'exist', 'skipOnError' => true, 'targetClass' => Fueltypes::className(), 'targetAttribute' => ['id_fueltype' => 'id']],
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
            'carbon' => Yii::t('main','Carbon'),
            'hydrogen' => Yii::t('main','Hydrogen'),
            'sulfur' => Yii::t('main','Sulfur'),
            'ash' => Yii::t('main','Ash'),
            'nitrogen' => Yii::t('main','Nitrogen'),
            'methane' => Yii::t('main','Methane'),
            'oxygen' => Yii::t('main','Oxygen'),
            'lower_combustion_heat' => Yii::t('main','Lower Combustion Heat'),
            'id_fueltype' => Yii::t('main','Fuel type'),
        ];
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
