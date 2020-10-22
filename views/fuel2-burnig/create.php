<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Fuel2Burnig */

$this->title = Yii::t('main','Create') . ' '. Yii::t('main','Fuel2 Burnig');
$this->params['breadcrumbs'][] = ['label' => Yii::t('main','Fuel2 Burnigs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fuel2-burnig-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'fueltypes' => empty($fueltypes)?[]:$fueltypes,
        'burningtypes' => empty($burningtypes)?[]:$burningtypes,
    ]) ?>

</div>
