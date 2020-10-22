<?php

namespace app\controllers;

use Yii;
use app\models\Fuel2Burnig;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use app\models\FuelTypes;
use app\models\BurningTypes;

/**
 * Fuel2BurnigController implements the CRUD actions for Fuel2Burnig model.
 */
class Fuel2BurnigController extends Controller
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
     * Lists all Fuel2Burnig models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Fuel2Burnig::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Fuel2Burnig model.
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
     * Creates a new Fuel2Burnig model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Fuel2Burnig();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        $fueltypesArray = FuelTypes::find()->all();
        // формируем массив, с ключем равным полю 'id' и значением равным полю 'name'
        if (!empty($fueltypesArray)) {
            $fueltypes = ArrayHelper::map($fueltypesArray, 'id', 'name');
        }

        $burningtypesArray = BurningTypes::find()->all();
        // формируем массив, с ключем равным полю 'id' и значением равным полю 'name'
        if (!empty($burningtypesArray)) {
            $burningtypes = ArrayHelper::map($burningtypesArray, 'id', 'name');
        }

        return $this->render('create', [
            'model' => $model,
            'fueltypes' => $fueltypes,
            'burningtypes' => empty($burningtypes)?[]:$burningtypes,
        ]);
    }

    /**
     * Updates an existing Fuel2Burnig model.
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

        $burningtypesArray = BurningTypes::find()->all();
        // формируем массив, с ключем равным полю 'id' и значением равным полю 'name'
        if (!empty($burningtypesArray)) {
            $burningtypes = ArrayHelper::map($burningtypesArray, 'id', 'name');
        }

        return $this->render('update', [
            'model' => $model,
            'fueltypes' => $fueltypes,
            'burningtypes' => empty($burningtypes)?[]:$burningtypes,
        ]);
    }

    /**
     * Deletes an existing Fuel2Burnig model.
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
     * Finds the Fuel2Burnig model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Fuel2Burnig the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Fuel2Burnig::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
