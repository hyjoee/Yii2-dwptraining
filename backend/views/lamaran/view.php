<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Lamaran */

$this->title = $model->nama;
$this->params['breadcrumbs'][] = ['label' => 'Lamarans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="lamaran-view">
    <div class="container" >
        <div class="row">
            <div class="col-md-11">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="post-detail">
                            <div class="mainDetails">
                                <div id="headshot" class="quickFade">
                                    <a href= "<?=Yii::getAlias('@web/').'uploads_foto/'.$model->foto?>"><img src="uploads_foto/<?=$model->foto?>" /></a>
                                </div>
                                
                                <div id="name">
                                    <h1 class="quickFade delayTwo">Curriculum Vitae</h1>
                                    <h2 class="quickFade delayThree"><?=$model->nama?></h2>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div id="mainArea" class="quickFade delayFive">
                                <section>
                                    <article>
                                        <div class="sectionTitle">
                                            <h1>Alasan</h1>
                                        </div>
                                        
                                        <div class="sectionContent">
                                            <p> <?=$model->alasan?> 
                                            </p>
                                        </div>
                                    </article>
                                    <div class="clear"></div>
                                </section>
                                <section>
                                    <div class="sectionTitle">
                                        <h1>Data Pribadi</h1>
                                    </div>
                                    <div class="sectionContent">
                                        <table>
                                        <tr>
                                            <td>Nama</td><td> : <?=$model->nama?></td>
                                        </tr>
                                        <tr>
                                            <td>Tempat, Tanggal Lahir</td><td> : <?=$model->tempat_lahir?>,<?=$model->tanggal_lahir?> </td>
                                        </tr>
                                        </table>
                                    </div>
                                    <div class="clear"></div>
                                </section>
                                <section>
                                    <div class="sectionTitle">
                                        <h1>Riwayat Pendidikan</h1>
                                    </div>
                                    <div class="sectionContent">
                                        <table>
                                        <tr>
                                            <td>Pendidikan Terakhir</td><td> : <?=$model->pendidikan?> </td>
                                        </tr>
                                        <tr>
                                            <td>Jurusan</td><td> : <?=$model->jurusan?> </td>
                                        </tr>
                                        </table>
                                    </div>
                                    <div class="clear"></div>
                                </section>
                                <section>
                                    <div class="sectionTitle">
                                        <h1>Data Pribadi</h1>
                                    </div>
                                    <div class="sectionContent">
                                        <table>
                                        <tr>
                                            <td>Ijazah</td><td> : <a href="<?=Yii::getAlias('@web/').'uploads_ijazah/'.$model->ijazah?>"><?=$model->ijazah?></a> </td>
                                        </tr>
                                        <tr>
                                            <td>Surat Lamaran</td><td> : <a href="<?=Yii::getAlias('@web/').'uploads_surat_lamaran/'.$model->surat_lamaran?>"><?=$model->surat_lamaran?></a> </td>
                                        </tr>
                                        <tr>
                                            <td>Tanggal Melamar</td><td> : <?=Yii::$app->formatter->asDate($model->created_at)?></td>
                                        </tr>
                                        </table>
                                    </div>
                                    <div class="clear"></div>
                                </section>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>        
    </div>
</div>
