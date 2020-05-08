<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\LinkPager;


/* @var $this yii\web\View */
/* @var $searchModel backend\models\KomentarSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Komentar';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="komentar-index content">

    <p>
        <?= Html::a('Tambah Komentar', ['create'], ['class' => 'btn btn-primary']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <table class="table table-hover">
	<tr >
            <td>No</td>
            <td>Berita Id</td>
            <td>Nama</td>
            <td>Email</td>
            <td>Isi Komentar</td>
            <td>Waktu Komentar</td>
            <td>Aksi</td>
        </tr>
        <?php $no=1; foreach ($select as $model):?>
        <tr>
            <td><?=$no?></td>
            <td><?=$model->berita_id?></td>
            <td><?=$model->nama?></td>
            <td><?=$model->email?></td>
            <td><?=$model->isi_komentar?></td>
            <td><?=Yii::$app->formatter->asDate($model->created_at)?></td>
            <td> 
                <?=Html::a("Update",['komentar/update','id'=>$model->id],['class'=>'btn btn-primary'])?>
                <?=Html::a("Delete",['komentar/delete','id'=>$model->id],['class'=>'btn btn-danger'])?>
            <td>
            
        </tr>
            <td> <?php $no++; endforeach;?></td>
    </table>
    <div style="float: right;">
        <?=LinkPager::widget(['pagination'=>$page]);?>
    </div>

</div>
