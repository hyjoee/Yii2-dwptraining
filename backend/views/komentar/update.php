<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Komentar */

$this->title = 'Update Komentar: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Komentar', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="komentar-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
