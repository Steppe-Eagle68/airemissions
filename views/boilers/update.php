<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Boilers */

$this->title = Yii::t('main','Update') . ' ' . Yii::t('main','boiler').': ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('main','Boilers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('main','Update');
?>
<div class="boilers-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'burningtypes' => empty($burningtypes)?[]:$burningtypes,
    ]) ?>

</div>
