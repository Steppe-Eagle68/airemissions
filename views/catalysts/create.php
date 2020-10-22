<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Catalysts */

$this->title = Yii::t('main','Create'). ' '. Yii::t('main', 'catalyst');
$this->params['breadcrumbs'][] = ['label' => Yii::t('main','Catalysts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="catalysts-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
