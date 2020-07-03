<?php

use yii\helpers\Html;
// use yii\widgets\ActiveForm;
use kartik\form\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Mahasiswa */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mahasiswa-form">

    <?php $form = ActiveForm::begin(
    [
        'type'=>ActiveForm::TYPE_HORIZONTAL,
        'options' => ['enctype' => 'multipart/form-data'],
        ]);
    ?>

<div style="display:inline;">
    <?= $form->field($model, 'nama',['labelOptions'=>['class'=>'col-md-2']]); ?>
    <?= $form->field($model, 'kelas',['labelOptions'=>['class'=>'col-md-2']]); ?>
</div>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
