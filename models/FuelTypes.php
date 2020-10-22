<?php

namespace app\models;

use Yii;
use app\models\Fuels;

/**
 * This is the model class for table "fueltypes".
 *
 * @property int $id
 * @property string $name
 */
class FuelTypes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'fueltypes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
            [['EmissionCH4'], 'number'],
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
            'EmissionCH4' => Yii::t('main','Methane emission rate'),
        ];
    }

    /**
     * Gets query for [[Fueltype]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFuel()
    {
        return $this->hasMany(Fuels::className(), ['id_fueltype' => 'id']);
    }

}
