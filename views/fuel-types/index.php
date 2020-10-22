<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('main','Fuel Types');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fuel-types-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('main','Create'). ' '. Yii::t('main','Fuel Type'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'name',
            'EmissionCH4',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
