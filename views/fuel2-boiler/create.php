<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Fuel2Boiler */

$this->title = Yii::t('main','Create') . ' '. Yii::t('main','Fuel2 Boiler');
$this->params['breadcrumbs'][] = ['label' => Yii::t('main','Fuel2 Boilers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fuel2-boiler-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'fueltypes' => empty($fueltypes)?[]:$fueltypes,
        'boilers' => empty($boilers)?[]:$boilers,
    ]) ?>

</div>
