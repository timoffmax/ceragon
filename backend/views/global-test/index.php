<?php

use kartik\grid\GridView;
use kartik\select2\Select2;
use yii\helpers\Html;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel common\models\GlobalTestSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $filters array */

$this->title = 'Global Tests';
$this->params['breadcrumbs'][] = $this->title;

// Return label type by test result state
const RESULT_TO_LABEL_TYPE = [
    'Pass' => 'success',
    'Pass*' => 'warning',
    'Fail' => 'danger',
    'Error' => 'danger',
];
?>
<div class="global-test-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin([
        'id' => 'global-test-table',
        'enablePushState' => false,
        'enableReplaceState' => false,
        'timeout' => 5000,
    ]); ?>

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
            'testDuration',
            [
                'attribute' => 'UUTPLACE',
                'contentOptions' => ['style' => 'width: 50px;']
            ],
            [
                'attribute' => 'GLOBALRESULT',
                'filter' => Select2::widget([
                    'model' => $searchModel,
                    'attribute' => 'GLOBALRESULT',
                    'data' => $filters['results'],
                    'hideSearch' => true,
                    'options' => [
                        'placeholder' => 'Select',
                        'value' => $searchModel->GLOBALRESULT,
                    ],
                    'pluginOptions' => [
                        'allowClear' => true,
                    ],
                ]),
                'format' => 'raw',
                'value' => function ($data) {
                    // Get label class by value
                    $labelType = RESULT_TO_LABEL_TYPE[$data['GLOBALRESULT']];

                    // Prepare template
                    $template = '<span class="label label-' . $labelType . '">' . $data['GLOBALRESULT'] . '</span>';

                    return $template;
                },
                'contentOptions' => ['style' => 'width: 100px;']
            ],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
