<?php

namespace app\models;

use Yii;
use yii\data\ActiveDataProvider;

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
class FuelsSearch extends \yii\db\ActiveRecord
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
            //[['name'], 'required'],
            [['carbon', 'hydrogen', 'sulfur', 'ash', 'nitrogen', 'methane', 'oxygen', 'lower_combustion_heat'], 'number'],
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
            'carbon' => Yii::t('main','Carbon'),
            'hydrogen' => Yii::t('main','Hydrogen'),
            'sulfur' => Yii::t('main','Sulfur'),
            'ash' => Yii::t('main','Ash'),
            'nitrogen' => Yii::t('main','Nitrogen'),
            'methane' => Yii::t('main','Methane'),
            'oxygen' => Yii::t('main','Oxygen'),
            'lower_combustion_heat' => Yii::t('main','Lower Combustion Heat'),
        ];
    }

    public function search($params) {

        $query = Fuels::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => ['attributes' => [
                'id', 'name', 'carbon'
            ]]
        ]);

        $this->load($params);
        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
//            'carbon' => $this->carbon,
//            'hydrogen' => $this->id,
//            'sulfur' => $this->hydrogen,
//            'ash' => $this->ash,
//            'nitrogen' => $this->nitrogen,
//            'methane' => $this->methane,
//            'oxygen' => $this->oxygen,
//            'lower_combustion_heat' => $this->lower_combustion_heat,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
        ;

        $query->andFilterWhere([
            'carbon' => $this->carbon,
        ]);

        return $dataProvider;
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
