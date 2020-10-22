<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Fuels */

$this->title = Yii::t('main','Update') . ' ' . Yii::t('main','fuel').': ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('main','Fuels'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('main','Update');
?>
<div class="fuels-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'fueltypes' => empty($fueltypes)?[]:$fueltypes,
    ]) ?>

</div>
