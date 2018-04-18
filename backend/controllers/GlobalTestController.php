<?php

namespace backend\controllers;

use Yii;
use common\models\GlobalTest;
use common\models\GlobalTestSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * GlobalTestController implements the CRUD actions for GlobalTest model.
 */
class GlobalTestController extends Controller
{
    /**
     * @inheritdoc
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
     * Lists all GlobalTest models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new GlobalTestSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        // Prepare values of dependent filters
        $dependentParams = [
            'FACILITY' => $searchModel->FACILITY ?? null,
            'STATIONID' => $searchModel->STATIONID ?? null,
            'UUTNAME' => $searchModel->UUTNAME ?? null,
            'PARTNUMBER' => $searchModel->PARTNUMBER ?? null,
        ];

        $facilities = GlobalTest::getDistinctValues('FACILITY', $dependentParams, true);
        $stations = GlobalTest::getDistinctValues('STATIONID', $dependentParams, true);
        $uutnames = GlobalTest::getDistinctValues('UUTNAME', $dependentParams, true);
        $partnumbers = GlobalTest::getDistinctValues('PARTNUMBER', $dependentParams, true);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'filters' => compact('facilities','stations', 'uutnames', 'partnumbers'),
        ]);
    }

    /**
     * Displays a single GlobalTest model.
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
     * Creates a new GlobalTest model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new GlobalTest();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing GlobalTest model.
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

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing GlobalTest model.
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
     * Finds the GlobalTest model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return GlobalTest the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = GlobalTest::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
