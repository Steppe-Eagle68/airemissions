<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Fuel2Boiler */

$this->title = 'Update Fuel2 Boiler: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Fuel2 Boilers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="fuel2-boiler-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'fueltypes' => empty($fueltypes)?[]:$fueltypes,
        'boilers' => empty($boilers)?[]:$boilers,
    ]) ?>

</div>
