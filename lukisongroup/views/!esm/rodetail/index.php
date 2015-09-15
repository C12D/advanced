<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\esm\ro\RodetailSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->sideMenu = 'esm';
$this->title = 'Rodetails';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="rodetail-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Rodetail', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID',
            'KD_RO',
            'KD_BARANG',
            'NM_BARANG',
            'QTY',
            // 'NO_URUT',
            // 'NOTE:ntext',
            // 'STATUS',
            // 'CREATED_AT',
            // 'UPDATED_AT',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
