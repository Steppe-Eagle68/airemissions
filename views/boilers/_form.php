<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\select2\Select2;
use kartik\number\NumberControl;

/* @var $this yii\web\View */
/* @var $model app\models\Boilers */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="boilers-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_burningtype')->widget(Select2::classname(), [
        'data' => empty($burningtypes)?[]:$burningtypes/*$data*/,
        'options' => ['placeholder' => Yii::t('main', 'Select a burning type')],
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

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
