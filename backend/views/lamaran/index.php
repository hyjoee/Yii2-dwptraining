<?php

use yii\helpers\Html;
use yii\widgets\LinkPager;

$this->title = 'Lamaran';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lamaran-index">
    <p>
        <?= Html::a('Tambah Lamaran', ['create'], ['class' => 'btn btn-primary']) ?>
    </p>
    <table class="table table-hover">
	<tr >
            <td>No</td>
            <td>Nama</td>
            <td>Tempat Lahir</td>
            <td>Tanggal Lahir</td>
            <td>Pendidikan Terakhir</td>
            <td>Jurusan</td>
            <td>Tanggal Melamar</td>
            <td>Aksi</td>
        </tr>
        <?php $no=1; foreach ($select as $model):?>
        <tr>
            <td><?=$no?></td>
            <td><?=$model->nama?></td>
            <td><?=$model->tempat_lahir?></td>
            <td><?=$model->tanggal_lahir?></td>
            <td><?=$model->pendidikan?></td>
            <td><?=$model->jurusan?></td>
            <td><?=Yii::$app->formatter->asDate($model->created_at)?></td>
            <td> 
                <?=Html::a("Update",['lamaran/update','id'=>$model->id],['class'=>'btn btn-primary'])?>
                <?=Html::a("Delete",['lamaran/delete','id'=>$model->id],['class'=>'btn btn-danger'])?>
                <?=Html::a("View",['lamaran/view','id'=>$model->id],['class'=>'btn btn-success'])?>
            <td>
            
        </tr>
            <td> <?php $no++; endforeach;?></td>
    </table>
    <div style="float: left;">
        <?=LinkPager::widget(['pagination'=>$page]);?>
    </div>
</div>
