
<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\esm\ro\RequestorderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->mddPage = 'esm';
$this->title = 'Request Order';
$this->params['breadcrumbs'][] = $this->title;
?>

<aside class="main-sidebar">
    <?php
		/*variable Dropdown*/
		use lukisongroup\models\system\side_menu\M1000;
		use kartik\sidenav\SideNav;
		$side_menu=\yii\helpers\Json::decode(M1000::find()->findMenu('esm')->one()->jval);		
		if (!Yii::$app->user->isGuest) {
			echo SideNav::widget([
				'items' => $side_menu,
				'encodeLabels' => false,
				//'heading' => $heading,
				'type' => SideNav::TYPE_DEFAULT,
				'options' => ['class' => 'sidebar-nav'],
			]);
		};
    ?>
</aside>

<div class="requestorder-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Request Order', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
			['class' => 'yii\grid\SerialColumn'],

//			'ID',
			'KD_RO',
			'NOTE:ntext',
			'ID_USER',
			'KD_CORP',
			// 'KD_CAB',
			// 'KD_DEP',
			// 'STATUS',
			// 'CREATED_AT',
			// 'UPDATED_ALL',
			// 'DATA_ALL:ntext',
		[
			'class' => 'yii\grid\ActionColumn',
			/*
			'template' => '{view} {update} {delete} {link}',
			'buttons' => [
			
				'view' => function ($url,$model,$key) {
					return Html::a('', $url, ['class' => 'glyphicon glyphicon-search', 
								'data-toggle'=>"modal",
								'data-target'=>"#mview",
								'data-title'=>"Detail ".$model->KD_RO,] );
//					'<span class="glyphicon glyphicon-search"></span>', 
//					$url);
				},
				
				'update' => function ($url,$model) {
				return Html::a(
				'<span class="glyphicon glyphicon-user"></span>', 
				$url);
				},
				
				'link' => function ($url,$model,$key) {
				return Html::a('Action', $url);
				},
			],
			*/
		],
	
        ],
    ]); ?>

</div>
