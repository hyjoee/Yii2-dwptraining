<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Komentar */

$this->title = 'Tambah Komentar';
$this->params['breadcrumbs'][] = ['label' => 'Komentar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="komentar-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
