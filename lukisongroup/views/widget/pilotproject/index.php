<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use leandrogehlen\treegrid\TreeGrid;
/* @var $this yii\web\View */
/* @var $searchModel lukisongroup\models\widget\PilotprojectSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pilotprojects';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pilotproject-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Pilotproject', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
 <?= TreeGrid::widget([
      'dataProvider' => $dataProvider,
      'keyColumnName' => 'ID',
      'parentColumnName' => 'PARENT',
      'columns' => [
          //'PILOT_ID',
          'PILOT_NM',
		  'PLAN_DATE1',
          'PLAN_DATE2',
		  'ACTUAL_DATE1',
          'ACTUAL_DATE2',
		  'DSCRP',
		  'STATUS',
          ['class' => 'yii\grid\ActionColumn']
      ]        
  ]); ?>
  
    <?php
	/*
	echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID',
            'PARENT',
            'DISC',
            'PLAN_DATE1',
            'PLAN_DATE2',
            // 'ACTUAL_DATE1',
            // 'ACTUAL_DATE2',
            // 'STATUS',
            // 'CORP_ID',
            // 'DEP_ID',
            // 'USER_CREATED',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); 
	*/
	?>

</div>
