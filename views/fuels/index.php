<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('main','Fuels');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fuels-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('main','Create') . ' '. Yii::t('main','fuel'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php
    $gridColumns = [
        ['class' => 'yii\grid\SerialColumn'],

        //'id',
        'name',
        'carbon',
        'hydrogen',
        'sulfur',
        'ash',
        'nitrogen',
        'methane',
        'oxygen',
        'lower_combustion_heat',
        'fueltype.name',

        ['class' => 'yii\grid\ActionColumn'],
    ];

//    // Renders a export dropdown menu
//    echo ExportMenu::widget([
//        'dataProvider' => $dataProvider,
//        'columns' => $gridColumns
//    ]);
//
//    echo ExcelExchanger::widget([
//        'mainModelName' => $searchModel, // here place model class name
//    ]);

    // You can choose to render your own GridView separately
    echo \kartik\grid\GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $gridColumns,
        'responsive'=>true,
        'hover'=>true
    ]);
    ?>


</div>
