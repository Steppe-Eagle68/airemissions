<?php

namespace app\controllers;

use app\models\BurningTypes;
use Yii;
use app\models\Boilers;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

/**
 * BoilersController implements the CRUD actions for Boilers model.
 */
class BoilersController extends Controller
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
     * Lists all Boilers models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Boilers::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Boilers model.
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
     * Creates a new Boilers model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Boilers();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        $burningtypesArray = BurningTypes::find()->all();
        // формируем массив, с ключем равным полю 'id' и значением равным полю 'name'
        if (!empty($burningtypesArray)) {
            $burningtypes = ArrayHelper::map($burningtypesArray, 'id', 'name');
        }

        return $this->render('create', [
            'model' => $model,
            'burningtypes' => empty($burningtypes)?[]:$burningtypes,
        ]);
    }

    /**
     * Updates an existing Boilers model.
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

        $burningtypesArray = BurningTypes::find()->all();
        // формируем массив, с ключем равным полю 'id' и значением равным полю 'name'
        if (!empty($burningtypesArray)) {
            $burningtypes = ArrayHelper::map($burningtypesArray, 'id', 'name');
        }

        return $this->render('update', [
            'model' => $model,
            'burningtypes' => empty($burningtypes)?[]:$burningtypes,
        ]);
    }

    /**
     * Deletes an existing Boilers model.
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
     * Finds the Boilers model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Boilers the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Boilers::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
