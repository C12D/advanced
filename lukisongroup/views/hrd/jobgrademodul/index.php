<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel lukisongroup\models\hrd\JobgrademodulSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Jobgrademoduls';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jobgrademodul-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Jobgrademodul', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID',
            'GF_ID',
            'SEQ_ID',
            'JOBGRADE_ID',
            'JOBGRADE_NM',
            // 'SORT',
            // 'JOBGRADE_STS',
            // 'JOBGRADE_DCRP:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
