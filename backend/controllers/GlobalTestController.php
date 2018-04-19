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
            'GLOBALRESULT' => $searchModel->GLOBALRESULT ?? null,
        ];

        $facilities = GlobalTest::getDistinctValues('FACILITY', $dependentParams, true);
        $stations = GlobalTest::getDistinctValues('STATIONID', $dependentParams, true);
        $uutnames = GlobalTest::getDistinctValues('UUTNAME', $dependentParams, true);
        $partnumbers = GlobalTest::getDistinctValues('PARTNUMBER', $dependentParams, true);
        $results = GlobalTest::getDistinctValues('GLOBALRESULT', $dependentParams, true);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'filters' => compact('facilities','stations', 'uutnames', 'partnumbers', 'results'),
        ]);
    }
}
