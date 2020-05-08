<?php

use yii\helpers\Html;
use yii\widgets\LinkPager;


$this->title = 'Berita';
$this->params['breadcrumbs'][] = $this->title;
?>
<br>
<div class="berita-index content">

    <p>
        <?= Html::a('Tambah Berita', ['create'], ['class' => 'btn btn-primary']) ?>
    </p>
    <?php  //echo $this->render('_search', ['model' => $searchModel]); ?>

    <table class="table table-hover">
	<tr >
            <td>No</td>
            <td>Judul</td>
            <td>Kategori Id</td>
            <td>Isi Berita</td>
            <td>File Lampiran</td>
            <td>Waktu Pembuatan</td>
            <td>Aksi</td>
        </tr>
        <?php $no=1; foreach ($select as $model):?>
        <tr>
            <td><?=$no?></td>
            <td><?=$model->judul?></td>
            <td><?=$model->jenis_berita_id?></td>
            <td><?php
            $num_char = 50;
                $cut_text = substr($model->isi_berita, 0, $num_char);
                if ($model->isi_berita{$num_char - 1} != ' ') {
                    $new_pos = strrpos($cut_text, ' ');
                    $cut_text = substr($model->isi_berita, 0, $new_pos);
                }
                echo $cut_text . '.....';
            ?></td>
            <td><?=$model->file_lampiran?></td>
            <td><?=Yii::$app->formatter->asDate($model->created_at)?></td>
            <td> 
                <?=Html::a("Update",['berita/update','id'=>$model->id],['class'=>'btn btn-primary'])?>
                <?=Html::a("Delete",['berita/delete','id'=>$model->id],['class'=>'btn btn-danger'])?>
                <?=Html::a("View",['berita/view','id'=>$model->id],['class'=>'btn btn-success'])?>
            <td>
            
        </tr>
            <td> <?php $no++; endforeach;?></td>
    </table>
    <div style="float: left;">
        <?=LinkPager::widget(['pagination'=>$page]);?>
    </div>

</div>
