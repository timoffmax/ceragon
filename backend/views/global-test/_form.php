<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\GlobalTest */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="global-test-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'FACILITY')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'STATIONID')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'UUTNAME')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'PARTNUMBER')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'SERIALNUMBER')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'TECHNAME')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'TESTDATE')->textInput() ?>

    <?= $form->field($model, 'TIMESTART')->textInput() ?>

    <?= $form->field($model, 'TIMESTOP')->textInput() ?>

    <?= $form->field($model, 'UUTPLACE')->textInput() ?>

    <?= $form->field($model, 'TESTMODE')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'GLOBALRESULT')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'INDEXRANGE')->textInput() ?>

    <?= $form->field($model, 'VERSIONS')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
