<?php
/**
 * Created by PhpStorm.
 * User: rousl
 * Date: 08.02.2020
 * Time: 18:12
 */

namespace app\models\Airemissions;

use app\models\Fuels;

class Airemissions
{
    private $emissionMetric;
    private $massSubstance;
    private $fuel;
    private $fuelConsumption;
    private $exception;
    private $name;
    private $boiler;
    private $catalyst;

    /**
     * Airemissions constructor.
     */
    public function __construct()
    {
        $this->fuelConsumption = 100;
    }
    /**
     * @return mixed
     */
    public function getEmissionMetric()
    {
        return $this->emissionMetric;
    }

    /**
     * @param mixed $emissionMetric
     */
    public function setEmissionMetric($emissionMetric)
    {
        $this->emissionMetric = $emissionMetric;
    }

    public function calcEmissionMetric()
    {
        return $this->emissionMetric;
    }

    /**
     * @return mixed
     */
    public function getMassSubstance()
    {
        return $this->massSubstance;
    }

    /**
     * @param mixed $massSubstance
     */
    public function setMassSubstance($massSubstance)
    {
        $this->massSubstance = $massSubstance;
    }

    /**
     * @return mixed
     */
    public function calcMassSubstance()
    {
        try {
            if (empty($this->emissionMetric)) {
                $this->calcEmissionMetric();
            }
            $this->massSubstance = pow(10, -6) *
                $this->getEmissionMetric() *
                $this->getFuelConsumption() *
                $this->getFuel()->lower_combustion_heat;
        }catch (\Exception $ex){
            $this->exception = $ex;
            $this->massSubstance = null;
        }
        return $this->massSubstance;
    }

    /**
     * @return mixed
     */
    public function getFuel()
    {
        return $this->fuel;
    }

    /**
     * @param mixed $fuel
     */
    public function setFuel(Fuels $fuel)
    {
        $this->fuel = $fuel;
    }

    /**
     * @return mixed
     */
    public function getFuelConsumption()
    {
        return $this->fuelConsumption;
    }

    /**
     * @param mixed $fuelConsumption
     */
    public function setFuelConsumption($fuelConsumption)
    {
        $this->fuelConsumption = $fuelConsumption;
    }

    /**
     * @return mixed
     */
    public function getException()
    {
        return $this->exception;
    }

    /**
     * @param mixed $exception
     */
    public function setException($exception)
    {
        $this->exception = $exception;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getBoiler()
    {
        return $this->boiler;
    }

    /**
     * @param mixed $boiler
     */
    public function setBoiler($boiler)
    {
        $this->boiler = $boiler;
    }

    /**
     * @return mixed
     */
    public function getCatalyst()
    {
        return $this->catalyst;
    }

    /**
     * @param mixed $catalyst
     */
    public function setCatalyst($catalyst)
    {
        $this->catalyst = $catalyst;
    }


}