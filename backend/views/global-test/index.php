<?php

use common\models\GlobalTest;
use kartik\grid\GridView;
use kartik\select2\Select2;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\GlobalTestSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $filters array */

$this->title = 'Global Tests';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="global-test-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin([
        'id' => 'global-test-table',
        'enablePushState' => false,
        'enableReplaceState' => false,
        'timeout' => 5000,
    ]); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'class' => 'yii\grid\SerialColumn',
                'contentOptions' => ['style' => 'width: 50px;']
            ],
            [
                'attribute' => 'FACILITY',
                'filter' => Select2::widget([
                    'model' => $searchModel,
                    'attribute' => 'FACILITY',
                    'data' => $filters['facilities'],
                    'hideSearch' => true,
                    'options' => [
                        'id' => 'select-facility',
                        'placeholder' => 'Select',
                        'value' => $searchModel->FACILITY,
                    ],
                    'pluginOptions' => [
                        'allowClear' => true,
                    ],
                ]),
                'contentOptions' => ['style' => 'width: 100px;']
            ],
            [
                'attribute' => 'STATIONID',
                'filter' => Select2::widget([
                    'model' => $searchModel,
                    'attribute' => 'STATIONID',
                    'data' => $filters['stations'],
                    'hideSearch' => true,
                    'options' => [
                        'id' => 'select-station',
                        'placeholder' => 'Select',
                        'value' => $searchModel->STATIONID,
                    ],
                    'pluginOptions' => [
                        'allowClear' => true,
                    ],
                ]),
                'contentOptions' => ['style' => 'width: 150px;']
            ],
            [
                'attribute' => 'UUTNAME',
                'filter' => Select2::widget([
                    'model' => $searchModel,
                    'attribute' => 'UUTNAME',
                    'data' => $filters['uutnames'],
                    'hideSearch' => true,
                    'options' => [
                        'placeholder' => 'Select',
                        'value' => $searchModel->UUTNAME,
                    ],
                    'pluginOptions' => [
                        'allowClear' => true,
                    ],
                ]),
                'contentOptions' => ['style' => 'width: 150px;']
            ],
            [
                'attribute' => 'PARTNUMBER',
                'filter' => Select2::widget([
                    'model' => $searchModel,
                    'attribute' => 'PARTNUMBER',
                    'data' => $filters['partnumbers'],
                    'hideSearch' => true,
                    'options' => [
                        'placeholder' => 'Select',
                        'value' => $searchModel->PARTNUMBER,
                    ],
                    'pluginOptions' => [
                        'allowClear' => true,
                    ],
                ]),
                'contentOptions' => ['style' => 'width: 150px;']
            ],
            [
                'attribute' => 'SERIALNUMBER',
                'contentOptions' => ['style' => 'width: 150px;']
            ],
            [
                'attribute' => 'TESTDATE',
                'contentOptions' => ['style' => 'width: 100px;']
            ],
            [
                'attribute' => 'TIMESTART',
                'contentOptions' => ['style' => 'width: 70px;']
            ],
            [
                'label' => 'Test time',
                'value' => function ($data) {
                    $startTime = \DateTime::createFromFormat('H:i:s', $data->TIMESTART);
                    $endTime = \DateTime::createFromFormat('H:i:s', $data->TIMESTOP);

                    $duration = ($endTime->getTimestamp() - $startTime->getTimestamp());

                    return number_format($duration / 60, 2) . 'm';
                },
                'format' => 'raw',
                'contentOptions' => ['style' => 'width: 70px;']
            ],
            [
                'attribute' => 'UUTPLACE',
                'contentOptions' => ['style' => 'width: 50px;']
            ],
            [
                'attribute' => 'GLOBALRESULT',
                'contentOptions' => ['style' => 'width: 100px;']
            ],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
