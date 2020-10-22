<?php

namespace app\controllers;

use app\models\Boilers;
use app\models\FuelTypes;
use Yii;
use app\models\Fuel2Boiler;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

/**
 * Fuel2BoilerController implements the CRUD actions for Fuel2Boiler model.
 */
class Fuel2BoilerController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Fuel2Boiler models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Fuel2Boiler::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Fuel2Boiler model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Fuel2Boiler model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Fuel2Boiler();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        $fueltypesArray = FuelTypes::find()->all();
        // формируем массив, с ключем равным полю 'id' и значением равным полю 'name'
        if (!empty($fueltypesArray)) {
            $fueltypes = ArrayHelper::map($fueltypesArray, 'id', 'name');
        }


        $boilersArray = Boilers::find()->all();
        // формируем массив, с ключем равным полю 'id' и значением равным полю 'name'
        if (!empty($boilersArray)) {
            $boilers = ArrayHelper::map($boilersArray, 'id', 'name');
        }


        return $this->render('create', [
            'model' => $model,
            'fueltypes' => $fueltypes,
            'boilers' => $boilers,
        ]);
    }

    /**
     * Updates an existing Fuel2Boiler model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        $fueltypesArray = FuelTypes::find()->all();
        // формируем массив, с ключем равным полю 'id' и значением равным полю 'name'
        if (!empty($fueltypesArray)) {
            $fueltypes = ArrayHelper::map($fueltypesArray, 'id', 'name');
        }

        $boilersArray = Boilers::find()->all();
        // формируем массив, с ключем равным полю 'id' и значением равным полю 'name'
        if (!empty($boilersArray)) {
            $boilers = ArrayHelper::map($boilersArray, 'id', 'name');
        }

        return $this->render('update', [
            'model' => $model,
            'fueltypes' => $fueltypes,
            'boilers' => $boilers,

        ]);
    }

    /**
     * Deletes an existing Fuel2Boiler model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Fuel2Boiler model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Fuel2Boiler the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Fuel2Boiler::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
