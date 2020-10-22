<?php

namespace app\controllers;

use app\models\Boilers;

class AjaxController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionGetboilers($id)
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        try{
            if (($model = Boilers::find()
                    ->innerJoin('fuel2boiler', 'fuel2boiler.id_boiler = boilers.id')
                    ->innerJoin('fuels', 'fuels.id_fueltype = fuel2boiler.id_fueltype')
                    ->where(['fuels.id' => $id])
                    ->all()) !== null) {
                return $model;
            }
            throw new NotFoundHttpException('The requested page does not exist.');
        }catch(\Exception $ex){
            return $ex;
        }
    }


}
