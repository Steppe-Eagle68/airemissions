<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\Fuel2Boiler */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="fuel2-boiler-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_fueltype')->widget(Select2::classname(), [
        'data' => empty($fueltypes)?[]:$fueltypes/*$data*/,
        'options' => ['placeholder' => Yii::t('main', 'Select a fuel type')],
        'pluginOptions' => [
            'allowClear' => true,
            "change" => "function() { console.log('change'); }",
            "select2:opening" => "function() { console.log('select2:opening'); }",
            "select2:open" => "function() { console.log('open'); }",
            "select2:closing" => "function() { console.log('close'); }",
            "select2:close" => "function() { console.log('close'); }",
            "select2:selecting" => "function() { console.log('selecting'); }",
            "select2:select" => "function() { console.log('select'); }",
            "select2:unselecting" => "function() { console.log('unselecting'); }",
            "select2:unselect" => "function() { console.log('unselect'); }"
        ],
    ]); ?>

    <?= $form->field($model, 'id_boiler')->widget(Select2::classname(), [
        'data' => empty($boilers)?[]:$boilers/*$data*/,
        'options' => ['placeholder' => Yii::t('main', 'Select a boiler')],
        'pluginOptions' => [
            'allowClear' => true,
            "change" => "function() { console.log('change'); }",
            "select2:opening" => "function() { console.log('select2:opening'); }",
            "select2:open" => "function() { console.log('open'); }",
            "select2:closing" => "function() { console.log('close'); }",
            "select2:close" => "function() { console.log('close'); }",
            "select2:selecting" => "function() { console.log('selecting'); }",
            "select2:select" => "function() { console.log('select'); }",
            "select2:unselecting" => "function() { console.log('unselecting'); }",
            "select2:unselect" => "function() { console.log('unselect'); }"
        ],
    ]); ?>


    <?= $form->field($model, 'EmissionCO')->textInput() ?>

    <?= $form->field($model, 'EmissionNO')->textInput() ?>

    <?= $form->field($model, 'mechanical_shortage')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
