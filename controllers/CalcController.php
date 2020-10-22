<?php

namespace app\controllers;

use app\models\Boilers;
use app\models\Catalysts;
use Yii;
use app\models\CalcForm;
use app\models\Airemissions\SuspendedSolids;
use app\models\Fuels;
use app\models\Airemissions\NitrogenDioxide;
use app\models\Airemissions\SulfurDioxide;
use app\models\Airemissions\CarbonOxide;
use app\models\Airemissions\CarbonDioxide;
use app\models\Airemissions\NitrousOxide;
use app\models\Airemissions\NonMethaneLightOrganicCompounds;
use app\models\Airemissions\Methane;
use app\models\Airemissions\SpecificVolumeDryFlueGas;
use yii\helpers\ArrayHelper;

class CalcController extends \yii\web\Controller
{


    /**
     * CalcController constructor.
     */
    public function __construct($id, $module, $config = [])
    {
        parent::__construct($id, $module, $config);
    }

    public function actionIndex()
    {
        $model = new CalcForm();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

            $data = array();

            $fuelId = Yii::$app->request->post('CalcForm')['fuel'];

            if (!empty($fuelId)) {
                $boilers = ArrayHelper::map(
                    Boilers::find()
                        ->innerJoin('fuel2boiler', 'fuel2boiler.id_boiler = boilers.id')
                        ->innerJoin('fuels', 'fuels.id_fueltype = fuel2boiler.id_fueltype')
                        ->where(['fuels.id' => $fuelId])
                        ->all(),
                    'id', 'name');
            }

            $fuel = Fuels::find()->where(['id' => $fuelId])->one();

            $boilerId = Yii::$app->request->post('CalcForm')['boiler'];
            $boiler = Boilers::find()->where(['id' => $boilerId])->one();

            $catalystId = Yii::$app->request->post('CalcForm')['catalyst'];
            $catalyst = Catalysts::find()->where(['id' => $catalystId])->one();

            // Речовини у вигляді суспендованих твердих частинок
            $suspendedSolids = new SuspendedSolids();
            $suspendedSolids->setFuel($fuel);
            $suspendedSolids->setBoiler($boiler);
            $suspendedSolids->setCatalyst($catalyst);
            $data[] = array(
                'name' => $suspendedSolids->getName(),
                'value' => $suspendedSolids->calcMassSubstance()
            );
            // Азоту діоксид
            $nitrogenDioxide = new NitrogenDioxide();
            $nitrogenDioxide->setFuel($fuel);
            $nitrogenDioxide->setBoiler($boiler);
            $nitrogenDioxide->setCatalyst($catalyst);
            $data[] = array(
                'name' => $nitrogenDioxide->getName(),
                'value' => $nitrogenDioxide->calcMassSubstance()
            );
            // Сірки діоксид
            $sulfurDioxide = new SulfurDioxide();
            $sulfurDioxide->setFuel($fuel);
            $sulfurDioxide->setBoiler($boiler);
            $sulfurDioxide->setCatalyst($catalyst);
            $data[] = array(
                'name' => $sulfurDioxide->getName(),
                'value' => $sulfurDioxide->calcMassSubstance()
            );
            // Вуглецю оксид
            $carbonOxide = new CarbonOxide();
            $carbonOxide->setFuel($fuel);
            $carbonOxide->setBoiler($boiler);
            $carbonOxide->setCatalyst($catalyst);
            $data[] = array(
                'name' => $carbonOxide->getName(),
                'value' => $carbonOxide->calcMassSubstance()
            );
            // Вуглецю діоксид
            $carbonDioxide = new CarbonDioxide();
            $carbonDioxide->setFuel($fuel);
            $carbonDioxide->setBoiler($boiler);
            $carbonDioxide->setCatalyst($catalyst);
            $data[] = array(
                'name' => $carbonDioxide->getName(),
                'value' => $carbonDioxide->calcMassSubstance()
            );
            // Діазоту оксид
            $nitrousOxide = new NitrousOxide();
            $nitrousOxide->setFuel($fuel);
            $nitrousOxide->setBoiler($boiler);
            $nitrousOxide->setCatalyst($catalyst);
            $data[] = array(
                'name' => $nitrousOxide->getName(),
                'value' => $nitrousOxide->calcMassSubstance()
            );
            // Метан
            $methane = new Methane();
            $methane->setFuel($fuel);
            $methane->setBoiler($boiler);
            $methane->setCatalyst($catalyst);
            $data[] = array(
                'name' => $methane->getName(),
                'value' => $methane->calcMassSubstance()
            );
            // Неметанові легкі органічні сполуки
            $nonMethaneLightOrganicCompounds = new NonMethaneLightOrganicCompounds();
            $nonMethaneLightOrganicCompounds->setFuel($fuel);
            $nonMethaneLightOrganicCompounds->setBoiler($boiler);
            $nonMethaneLightOrganicCompounds->setCatalyst($catalyst);
            $data[] = array(
                'name' => $nonMethaneLightOrganicCompounds->getName(),
                'value' => $nonMethaneLightOrganicCompounds->calcMassSubstance()
            );
            // Питомий об'єм сухих димових газів
            $specificVolumeDryFlueGas = new SpecificVolumeDryFlueGas();
            $specificVolumeDryFlueGas->setFuel($fuel);
            $specificVolumeDryFlueGas->setBoiler($boiler);
            $specificVolumeDryFlueGas->setCatalyst($catalyst);
            $data[] = array(
                'name' => $specificVolumeDryFlueGas->getName(),
                'value' => $specificVolumeDryFlueGas->calcMassSubstance()
            );
        }

        $catalysts = ArrayHelper::map(
            Catalysts::find()
                ->all(),
            'id', 'name');

        if (empty($catalysts)){
            $catalysts = [0 => Yii::t('main', 'Without catalyst')];
        }else{
            $catalysts = array_merge([0 => Yii::t('main', 'Without catalyst')], $catalysts);
        }

        return $this->render('index', [
            'model' => $model,
            'data' => empty($data)?'':$data,
            'boilers' => empty($boilers)?'':$boilers,
            'catalysts' => empty($catalysts)?'':$catalysts,
        ]);
    }

}
