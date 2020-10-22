<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "catalyst".
 *
 * @property int $id
 * @property string $name
 * @property float $declineNitrogenDioxide
 * @property float $declineCarbonOxide
 * @property float $declineSulfurDioxide
 */
class Catalysts extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'catalysts';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'declineNitrogenDioxide', 'declineCarbonOxide', 'declineSulfurDioxide'], 'required'],
            [['declineNitrogenDioxide', 'declineCarbonOxide', 'declineSulfurDioxide'], 'number'],
            [['name'], 'string', 'max' => 50],
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
            'declineNitrogenDioxide' => Yii::t('main','Reducing nitrogen dioxide emissions, %'),
            'declineCarbonOxide' => Yii::t('main','Reducing carbon oxide emissions, %'),
            'declineSulfurDioxide' => Yii::t('main','Reducing sulfur dioxide emissions, %'),
        ];
    }
}
