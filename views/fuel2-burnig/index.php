<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('main','Fuel2 Burnigs');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fuel2-burnig-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('main','Create'). ' '. Yii::t('main','Fuel2 Burnig'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'fueltype.name',
            'burningtype.name',
            'EmissionCO',
            'EmissionNO',
            'mechanical_shortage',
            'EmissionNMLOC',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
