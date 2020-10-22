<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Catalysts */

$this->title = Yii::t('main','Update') . ' ' . Yii::t('main', 'catalyst').': ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('main','Catalysts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('main','Update');
?>
<div class="catalysts-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
