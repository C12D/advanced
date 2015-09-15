<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\esm\DistributorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->sideMenu = 'esm';
$this->title = 'Distributor';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="distributor-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Buat Distributor', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'idDbtr',
            'KD_DISTRIBUTOR',
            'NM_DISTRIBUTOR',
            'ALAMAT:ntext',
            'PIC',
            // 'tlp1',
            // 'tlp2',
            // 'fax',
            // 'email:email',
            // 'website',
            // 'NOTE:ntext',
            // 'STATUS',
            // 'createBy',
            // 'createAt',
            // 'updateAt',
            // 'DATA_ALL',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
