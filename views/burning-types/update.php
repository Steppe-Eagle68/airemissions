<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\BurningTypes */

$this->title = Yii::t('main','Update') . ' ' . Yii::t('main','Burning Type').': ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('main','Burning Types'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('main','Update');
?>
<div class="burning-types-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
