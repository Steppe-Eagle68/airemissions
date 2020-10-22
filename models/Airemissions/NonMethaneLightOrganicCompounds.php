<?php
/**
 * Created by PhpStorm.
 * User: rousl
 * Date: 08.02.2020
 * Time: 20:51
 */

namespace app\models\Airemissions;

use Yii;
use app\models\Fuel2Burnig;

class NonMethaneLightOrganicCompounds extends Airemissions
{
    public function __construct(){
        parent::__construct();
        $this->setName(Yii::t('main', 'Nonmethane light organic compounds'));
    }

    public function calcEmissionMetric()
    {
        try{

            $fuel = $this->getFuel();
            $boiler = $this->getBoiler();
            $fuel2Burning = Fuel2Burnig::find()
                ->where([
                    'id_fueltype' => $fuel->id_fueltype,
                    'id_burningtype' => $boiler->id_burningtype
                ])->one();

            $this->setEmissionMetric(
                $fuel2Burning->EmissionNMLOC
            );
        }catch (\Exception $ex){
            $this->setException($ex);
            $this->setEmissionMetric(null);
        }
        return parent::calcEmissionMetric(); // TODO: Change the autogenerated stub
    }

}