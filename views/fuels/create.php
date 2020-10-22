<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Fuels */

$this->title = Yii::t('main','Create') . ' '. Yii::t('main','fuel');
$this->params['breadcrumbs'][] = ['label' => Yii::t('main','Fuels'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fuels-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'fueltypes' => empty($fueltypes)?[]:$fueltypes,
    ]) ?>

</div>
