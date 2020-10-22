<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Boilers */

$this->title = Yii::t('main','Create') . ' '. Yii::t('main','boiler');
$this->params['breadcrumbs'][] = ['label' => Yii::t('main','Boilers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="boilers-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'burningtypes' => empty($burningtypes)?[]:$burningtypes,
    ]) ?>

</div>
