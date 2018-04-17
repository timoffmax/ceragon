<?php

use kartik\grid\GridView;
use yii\helpers\Html;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\GlobalTestSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Global Tests';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="global-test-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'FACILITY',
            'STATIONID',
            'UUTNAME',
            'PARTNUMBER',
            'SERIALNUMBER',
            'TECHNAME',
            'TESTDATE',
            'TIMESTART',
            'TIMESTOP',
            'UUTPLACE',
            'TESTMODE',
            'GLOBALRESULT',
            'INDEXRANGE',
            'VERSIONS',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
