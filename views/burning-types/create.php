<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\BurningTypes */

$this->title = Yii::t('main','Create') . ' '. Yii::t('main','Burning Type');
$this->params['breadcrumbs'][] = ['label' => Yii::t('main','Burning Types'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="burning-types-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
