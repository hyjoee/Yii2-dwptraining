<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use dosamigos\datepicker\DatePicker;

$this->title = 'Lamaran';
?>
<div class="lamaran-index">
    <div class="container" style="margin-top:60px">
        <div class="row">
            <div class="col-md-11">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="post-detail">
                            <h3>Form Lamaran</h3>
                            <div class="info-meta">
                                <ul class="list-inline">
                                    <i><p>isi data dengan benar</i>
                                </ul>
                            </div>
                            <hr>
                            <div>
                            <?php $form = ActiveForm::begin(); ?>
                                <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

                                <?= $form->field($model, 'tempat_lahir')->textInput(['maxlength' => true]) ?>

                                <?= $form->field($model, 'tanggal_lahir')->widget(DatePicker::className(), [
                                        'inline' => true,
                                        'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
                                        'clientOptions' => [
                                    'autoclose' => true, 
                                    'format' => 'yyyy-mm-dd' ]
                                    ]); 
                                ?>

                                <?=$form->field($model, 'pendidikan')->dropDownList(['sma'=>'SMA/Sederajat','d3'=>'D3','s1'=>'S1','s2'=>'S2','s3'=>'S3'],['prompt'=>'Pilih'])->label('Pendidikan Terakhir')?>

                                <?= $form->field($model, 'jurusan')->textInput(['maxlength' => true]) ?>
                                
                                <?= $form->field($model, 'foto')->fileInput(['maxSize' => true]) ?>
                                
                                <?= $form->field($model, 'foto_close_up')->fileInput(['maxSize' => true]) ?>

                                <?= $form->field($model, 'ijazah')->fileInput(['maxSize' => true]) ?>

                                <?= $form->field($model, 'surat_lamaran')->fileInput(['maxSize' => true]) ?>

                                <?= $form->field($model, 'alasan')->textarea(['rows' => 6]) ?>

                                <div class="form-group">
                                    <?= Html::submitButton('Kirim', ['class' => 'btn btn-success']) ?>
                                </div>

                                <?php ActiveForm::end(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>        
    </div>
</div>
