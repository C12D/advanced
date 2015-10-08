<?php

use yii\helpers\Html;

$this->sideCorp = 'Modul HRM';                        /* Title Select Company pada header pasa sidemenu/menu samping kiri */
$this->sideMenu = 'hrd_modul';                        /* kd_menu untuk list menu pada sidemenu, get from table of database */
$this->title = Yii::t('app', 'Update - Department');           /* title pada header page */
?>

<h1><?= Html::encode($this->title) ?></h1>

<?= $this->render('_form', [
	'model' => $model,
]) ?>

