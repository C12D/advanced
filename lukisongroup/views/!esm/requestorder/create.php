<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\esm\ro\Requestorder */
$this->sideMenu = 'esm';
$this->title = 'Buat Request Order ';
$this->params['breadcrumbs'][] = ['label' => 'Request Order', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="requestorder-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'reqorder' => $reqorder,
        'rodetail' => $rodetail,
    ]);
	?>

</div>
