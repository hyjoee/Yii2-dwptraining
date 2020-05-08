<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Kategori;
use dosamigos\ckeditor\CKEditor;
use vova07\imperavi\Widget;

/* @var $this yii\web\View */
/* @var $model backend\models\Berita */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="berita-form" style="margin-left:15px;">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'judul')->textInput(['maxlength' => true]) ?>

    <?=$form->field($model, 'jenis_berita_id')->dropDownList(
        ArrayHelper::map(Kategori::find()->all(),'id','nama'),['prompt'=>'Pilih Kategori'])->label('Kategori')?>
   
   <?= $form->field($model, 'isi_berita')->widget(Widget::className(), [
        'settings' => [
        'minHeight' => 200,
        'plugins' => [
        'clips',
        'fullscreen'
        ]
    ]
    ])->label('isi berita');?>

    <?= $form->field($model, 'file_lampiran')->fileInput(['multiple' => true]) ?>
    
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
