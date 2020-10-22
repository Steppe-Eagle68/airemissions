<?php
/**
 * Created by PhpStorm.
 * User: rousl
 * Date: 09.02.2020
 * Time: 12:11
 */
namespace app\models;

use Yii;

class CalcForm extends \yii\base\Model
{
    public $fuel;
    public $boiler;
    public $catalyst;

//    public function rules()
//    {
//        return [
//            // тут определяются правила валидации
//            [['fuel'], 'required'],
//            //[['fuel'], 'integer'],
//        ];
//    }

    public function rules()
    {
        return [
            [['fuel', 'boiler'], 'required'],
            [['fuel', 'boiler', 'catalyst'], 'integer'],
            [['fuel'], 'exist', 'skipOnError' => true, 'targetClass' => Fuels::className(), 'targetAttribute' => ['fuel' => 'id']],
            [['boiler'], 'exist', 'skipOnError' => true, 'targetClass' => Boilers::className(), 'targetAttribute' => ['boiler' => 'id']],
            //[['catalyst'], 'exist', 'skipOnError' => true, 'targetClass' => Catalysts::className(), 'targetAttribute' => ['catalyst' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'fuel' => Yii::t('main','Fuel'),
            'boiler' => Yii::t('main','Boiler'),
            'catalyst' => Yii::t('main','Catalyst'),
        ];
    }

}