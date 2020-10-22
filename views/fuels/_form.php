<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\select2\Select2;
use kartik\number\NumberControl;

/* @var $this yii\web\View */
/* @var $model app\models\Fuels */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="fuels-form">

    <?php $form = ActiveForm::begin(
        [
            'layout' => 'horizontal',
            'fieldConfig' => [
                'template' => "<div class=\"form-group text-left\"> {label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-7\">{error}</div></div>",
                'labelOptions' => ['class' => 'text-left col-lg-2 control-label'],
            ],
        ]
    ); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'carbon')->widget(NumberControl::className(), [
        'maskedInputOptions' => [
            'alias' => 'numeric',
            'digits' => 2,
            'groupSeparator' => '',
            'autoGroup' => false,
        ],
        'displayOptions' => [
            'placeholder' => Yii::t('main','0.00'),
            'class' => 'form-control kv-monospace'
        ],
        'saveInputContainer' => ['class' => 'kv-saved-cont']
    ]) ?>


    <?= $form->field($model, 'hydrogen')->widget(NumberControl::className(), [
        'maskedInputOptions' => [
            'alias' => 'numeric',
            'digits' => 2,
            'groupSeparator' => '',
            'autoGroup' => false,
        ],
        'displayOptions' => [
            'placeholder' => Yii::t('main','0.00'),
            'class' => 'form-control kv-monospace'
        ],
        'saveInputContainer' => ['class' => 'kv-saved-cont']
    ]) ?>


    <?= $form->field($model, 'sulfur')->widget(NumberControl::className(), [
        'maskedInputOptions' => [
            'alias' => 'numeric',
            'digits' => 2,
            'groupSeparator' => '',
            'autoGroup' => false,
        ],
        'displayOptions' => [
            'placeholder' => Yii::t('main','0.00'),
            'class' => 'form-control kv-monospace'
        ],
        'saveInputContainer' => ['class' => 'kv-saved-cont']
    ]) ?>


    <?= $form->field($model, 'ash')->widget(NumberControl::className(), [
        'maskedInputOptions' => [
            'alias' => 'numeric',
            'digits' => 2,
            'groupSeparator' => '',
            'autoGroup' => false,
        ],
        'displayOptions' => [
            'placeholder' => Yii::t('main','0.00'),
            'class' => 'form-control kv-monospace'
        ],
        'saveInputContainer' => ['class' => 'kv-saved-cont']
    ]) ?>


    <?= $form->field($model, 'nitrogen')->widget(NumberControl::className(), [
        'maskedInputOptions' => [
            'alias' => 'numeric',
            'digits' => 2,
            'groupSeparator' => '',
            'autoGroup' => false,
        ],
        'displayOptions' => [
            'placeholder' => Yii::t('main','0.00'),
            'class' => 'form-control kv-monospace'
        ],
        'saveInputContainer' => ['class' => 'kv-saved-cont']
    ]) ?>


    <?= $form->field($model, 'methane')->widget(NumberControl::className(), [
        'maskedInputOptions' => [
            'alias' => 'numeric',
            'digits' => 2,
            'groupSeparator' => '',
            'autoGroup' => false,
        ],
        'displayOptions' => [
            'placeholder' => Yii::t('main','0.00'),
            'class' => 'form-control kv-monospace'
        ],
        'saveInputContainer' => ['class' => 'kv-saved-cont']
    ]) ?>


    <?= $form->field($model, 'oxygen')->widget(NumberControl::className(), [
        'maskedInputOptions' => [
            'alias' => 'numeric',
            'digits' => 2,
            'groupSeparator' => '',
            'autoGroup' => false,
        ],
        'displayOptions' => [
            'placeholder' => Yii::t('main','0.00'),
            'class' => 'form-control kv-monospace'
        ],
        'saveInputContainer' => ['class' => 'kv-saved-cont']
    ]) ?>


    <?= $form->field($model, 'lower_combustion_heat')->widget(NumberControl::className(), [
        'maskedInputOptions' => [
            'alias' => 'numeric',
            'digits' => 2,
            'groupSeparator' => '',
            'autoGroup' => false,
        ],
        'displayOptions' => [
            'placeholder' => Yii::t('main','0.00'),
            'class' => 'form-control kv-monospace'
        ],
        'saveInputContainer' => ['class' => 'kv-saved-cont']
    ]) ?>


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

    <div class="form-group">
        <?= Html::submitButton(Yii::t('main','Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
