<?php

use yii\helpers\Html;
use yii\widgets\LinkPager;


/* @var $this yii\web\View */
/* @var $searchModel backend\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'User';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <p>
        <?= Html::a('Tambah User', ['create'], ['class' => 'btn btn-primary']) ?>
    </p>
    <?php  //echo $this->render('_search', ['model' => $searchModel]); ?>

    <table class="table table-hover">
	<tr >
            <td>No</td>
            <td>Username</td>
            <td>Email</td>
            <td>Password Has</td>
            <td>Aksi</td>
        </tr>
        <?php $no=1; foreach ($select as $model):?>
        <tr>
            <td><?=$no?></td>
            <td><?=$model->username?></td>
            <td><?=$model->email?></td>
            <td><?=$model->password_hash?></td>
            <td> 
                <?=Html::a("Update",['user/update','id'=>$model->id],['class'=>'btn btn-primary'])?>
                <?=Html::a("Delete",['user/delete','id'=>$model->id],['class'=>'btn btn-danger'])?>
                <?=Html::a("View",['user/view','id'=>$model->id],['class'=>'btn btn-success'])?>
            <td>
            
        </tr>
            <td> <?php $no++; endforeach;?></td>
    </table>
    <div style="float: left;">
        <?=LinkPager::widget(['pagination'=>$page]);?>
    </div>

</div>
