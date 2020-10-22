<?php
/**
 * Created by PhpStorm.
 * User: rousl
 * Date: 08.02.2020
 * Time: 20:40
 */

namespace app\models\Airemissions;

use app\models\Fuel2Boiler;
use Yii;

class CarbonOxide extends Airemissions
{
    public function __construct(){
        parent::__construct();
        $this->setName(Yii::t('main', 'Carbon oxide'));
    }

    public function calcEmissionMetric()
    {
        try{
            $fuel = $this->getFuel();
            $boiler = $this->getBoiler();
            $fuel2Boiler = Fuel2Boiler::find()
                ->where([
                    'id_fueltype' => $fuel->id_fueltype,
                    'id_boiler' => $boiler->id
                ])->one();
            $this->setEmissionMetric(
                //800 * (1 - 13.5/ 100)// TODO
                $fuel2Boiler->EmissionCO * (1 - $fuel2Boiler->mechanical_shortage/ 100)
            );
        }catch (\Exception $ex){
            $this->setException($ex);
            $this->setEmissionMetric(null);
        }
        return parent::calcEmissionMetric(); // TODO: Change the autogenerated stub
    }

    public function calcMassSubstance()
    {
        try {
            $massSubstance = parent::calcMassSubstance();
            if (!empty($massSubstance) && !empty($this->getCatalyst())){
                $this->setMassSubstance($massSubstance *
                    (100.0 - $this->getCatalyst()->declineCarbonOxide) / 100.0);
            }
        }catch (\Exception $ex){
            $this->setException($ex);
            $this->setMassSubstance(null);
        }
        return $this->getMassSubstance();
    }

}