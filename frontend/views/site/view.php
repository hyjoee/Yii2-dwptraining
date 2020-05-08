<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use frontend\models\Komentar;

?>
<div class="container" style="margin-top:40px">
    <div class="row">
        <div class="col-md-11">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="post-detail">
                        <h3><?=$model->judul?></h3>
                        <div class="info-meta">
                            <ul class="list-inline">
                                <li><i class="fa fa-clock-o"></i> <?=Yii::$app->formatter->asDate($model->created_at)?></li>
                                <li><i class="fa fa-user"></i> Posting by Ilmu Detil</li>
                                <li class="pull-right">Category : <?=$model->jenis_berita_id?></li>
                            </ul>
                        </div>
                        <hr>
                        <p>
                        <!-- <img src="#" width="300px" alt="..." style="float:left;padding:5px 10px 5px 10px;"> -->
                        <?=$model->isi_berita?>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="panel panel-default" style="margin-top:40px">
                        <div class="panel-body">
                            <p>Kometar
                            <div class="info-meta">
                                <div >
                                    <?php 
                                    foreach ($model->komentars as $Komentar) {
                                        echo Yii::$app->formatter->asDate($Komentar->created_at,'H.M');
                                        echo ' : '.$Komentar->isi_komentar;
                                        ?><br>
                                    <?php }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div style="padding:20px;">
                    <?php $form = ActiveForm::begin(); ?>
                        <div>
                            <?= $form->field($Komentar, 'isi_komentar')->textInput()->label('') ?>
                            <?= Html::submitButton('Kirim', ['class' => 'btn btn-primary'],['berita_id'=>$model->id]) ?>
                        </div>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>        
</div>