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
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'FACILITY',
                'filter' => Select2::widget([
                    'model' => $searchModel,
                    'attribute' => 'FACILITY',
                    'data' => GlobalTest::getFacilities(),
                    'theme' => Select2::THEME_BOOTSTRAP,
                    'hideSearch' => true,
                    'options' => [
                        'id' => 'select-facility',
                        'placeholder' => 'Select facility',
                        'value' => isset($_GET['FACILITY']) ? $_GET['FACILITY'] : null,
                    ],
                    'pluginOptions' => [
                        'allowClear' => true,
                    ],
                    'pluginEvents' => [
                        "change" => "function(e) {
                            // Reset selected value for station select
                            $('#select-station').reset();
                            $('#select-station').trigger('change');
                            
                        }",
                    ],
                ]),
            ],
            [
                'attribute' => 'STATIONID',
                'filter' => Select2::widget([
                    'model' => $searchModel,
                    'attribute' => 'STATIONID',
                    'data' => $filters['stations'],
                    'theme' => Select2::THEME_BOOTSTRAP,
                    'hideSearch' => true,
                    'options' => [
                        'id' => 'select-station',
                        'placeholder' => 'Select station',
                        'value' => isset($_GET['STATIONID']) ? $_GET['STATIONID'] : null,
                    ],
                    'pluginOptions' => [
                        'allowClear' => true,
                    ],
                    'pluginEvents' => [
                        "select2:selecting" => "function(data) {
                            
                        }",
                    ],
                ]),
            ],
            'UUTNAME',
            'PARTNUMBER',
            'SERIALNUMBER',
            'TECHNAME',
            'TESTDATE',
            'TIMESTART',
//            'TIMESTOP',
            'UUTPLACE',
//            'TESTMODE',
            'GLOBALRESULT',
//            'INDEXRANGE',
//            'VERSIONS',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
