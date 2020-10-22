<?php

namespace app\controllers;

use Yii;
use app\models\Fuels;
use app\models\FuelsSearch;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\FuelTypes;
use yii\helpers\ArrayHelper;

/**
 * FuelsController implements the CRUD actions for Fuels model.
 */
class FuelsController extends Controller
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
     * Lists all Fuels models.
     * @return mixed
     */
    public function actionIndex()
    {
//        $dataProvider = new ActiveDataProvider([
//            'query' => Fuels::find(),
//        ]);
//
//        return $this->render('index', [
//            'dataProvider' => $dataProvider,
//        ]);

        $searchModel = new FuelsSearch();
        $searchModelImport = new Fuels();

        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
            'searchModelImport' => $searchModelImport
        ]);

    }

    /**
     * Displays a single Fuels model.
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
     * Creates a new Fuels model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Fuels();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        $fueltypesArray = FuelTypes::find()->all();
        // формируем массив, с ключем равным полю 'id' и значением равным полю 'name'
        if (!empty($fueltypesArray)) {
            $fueltypes = ArrayHelper::map($fueltypesArray, 'id', 'name');
        }

        return $this->render('create', [
            'model' => $model,
            'fueltypes' => $fueltypes,
        ]);
    }

    /**
     * Updates an existing Fuels model.
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

        return $this->render('update', [
            'model' => $model,
            'fueltypes' => $fueltypes,
        ]);
    }

    /**
     * Deletes an existing Fuels model.
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
     * Finds the Fuels model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Fuels the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Fuels::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
