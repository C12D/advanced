<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\master\Unitbarang */

$this->title = 'Create Unitbarang';
$this->params['breadcrumbs'][] = ['label' => 'Unitbarangs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="unitbarang-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
