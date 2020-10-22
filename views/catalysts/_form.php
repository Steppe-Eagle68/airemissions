<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Catalysts */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="catalysts-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'declineNitrogenDioxide')->textInput() ?>

    <?= $form->field($model, 'declineCarbonOxide')->textInput() ?>

    <?= $form->field($model, 'declineSulfurDioxide')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('main','Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
