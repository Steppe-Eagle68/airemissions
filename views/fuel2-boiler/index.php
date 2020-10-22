<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('main','Fuel2 Boilers');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fuel2-boiler-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('main','Create'). ' '. Yii::t('main','Fuel2 Boiler'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            //'id_fueltype',
            'fueltype.name',
            //'id_boiler',
            'boiler.name',
            'EmissionCO',
            'EmissionNO',
            'mechanical_shortage',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
