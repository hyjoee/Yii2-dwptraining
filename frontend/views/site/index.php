<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\widgets\LinkPager;

?>
<br>
<div class="berita-index content">
    <?php foreach ($select as $model):?>
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
                                <?php 
                                $num_char = 150;
                                    $cut_text = substr($model->isi_berita, 0, $num_char);
                                    if ($model->isi_berita{$num_char - 1} != ' ') {
                                        $new_pos = strrpos($cut_text, ' ');
                                        $cut_text = substr($model->isi_berita, 0, $new_pos);
                                    }
                                    echo $cut_text . '.....'.Html::a("baca selengkapnya",['view','id'=>$model->id]);
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>        
        </div>
        <?php endforeach;?>
    <div style="float: center;">
        <?=LinkPager::widget(['pagination'=>$page]);?>
    </div>

</div>
