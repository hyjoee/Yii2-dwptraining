<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Lamaran */

$this->title = 'Create Lamaran';
$this->params['breadcrumbs'][] = ['label' => 'Lamarans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lamaran-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
