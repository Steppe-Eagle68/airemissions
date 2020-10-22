<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Fuel2Burnig */

$this->title = 'Update Fuel2 Burnig: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Fuel2 Burnigs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="fuel2-burnig-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'fueltypes' => empty($fueltypes)?[]:$fueltypes,

        'burningtypes' => empty($burningtypes)?[]:$burningtypes,
    ]) ?>

</div>
