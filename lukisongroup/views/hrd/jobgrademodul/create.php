<?php

use yii\helpers\Html;

$this->sideCorp = 'Modul HRM';                            		/* Title Select Company pada header pasa sidemenu/menu samping kiri */
$this->sideMenu = 'hrd_modul';                            		/* kd_menu untuk list menu pada sidemenu, get from table of database */
$this->title = Yii::t('app', 'Create -Modul JobGrade');     /* title pada header page */
?>
<div class="jobgrademodul-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
