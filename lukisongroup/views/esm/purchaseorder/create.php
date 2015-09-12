<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model lukisongroup\models\esm\po\Purchaseorder */

$this->title = 'Create Purchaseorder';
$this->params['breadcrumbs'][] = ['label' => 'Purchaseorders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="purchaseorder-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // $this->render('_form', [
	 echo $this->render('_buat', [
        'model' => $model,
        'que' => $que,
		'searchModel' => $searchModel,
		'dataProvider' => $dataProvider,
    ]) ?>

</div>
