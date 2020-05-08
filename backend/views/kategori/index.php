<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;

$this->title = 'Kategori';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kategori-index content">
<p>
	<?=Html::a("Tambah Kategori",['kategori/entry'],['class'=>'btn btn-primary'])?>
</p>
<table class="table table-hover">
	<tr >
		<td>No</td>
		<td>Nama</td>
		<td>Keterangan</td>
		<td>Aksi</td>
	</tr>
	<?php $no=1; foreach ($select as $model):?>
	<tr>
		<td><?=$no?></td>
		<td><?=Html::encode("{$model->nama}")?></td>
		<td><?=$model->keterangan?></td>
		<td> 
			<?=Html::a("Edit",['kategori/edit','id'=>$model->id],['class'=>'btn btn-primary'])?>
			<?=Html::a("Delete",['kategori/delete','id'=>$model->id],['class'=>'btn btn-danger'])?>
		<td>
		
	</tr>
		<td> <?php $no++; endforeach;?></td>
</table>
<div style="float: right;">
	<?=LinkPager::widget(['pagination'=>$page]);?>
</div>
	</div>