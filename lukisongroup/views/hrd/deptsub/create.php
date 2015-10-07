<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model lukisongroup\models\hrd\Deptsub */

$this->title = 'Create Deptsub';
$this->params['breadcrumbs'][] = ['label' => 'Deptsubs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="deptsub-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
