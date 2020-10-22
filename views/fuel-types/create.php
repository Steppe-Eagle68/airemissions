<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\FuelTypes */

$this->title = Yii::t('main','Create') . ' '. Yii::t('main','Fuel Type');
$this->params['breadcrumbs'][] = ['label' => Yii::t('main','Fuel Types'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fuel-types-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
