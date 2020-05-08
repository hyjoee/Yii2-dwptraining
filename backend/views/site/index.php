<?php

/* @var $this yii\web\View */
use dosamigos\highcharts\HighCharts;
use backend\models\Komentar;

$this->title = 'My Yii Application';
?>
<div class="site-index">
    <?php
        foreach($data as $values):
            $a[0]= ($values['bulan']);
            $c[]= ($values['bulan']);
            $b[]= array('type'=> 'column', 'name' =>$values['bulan'], 'data' => array((int)$values['jml']));
        endforeach;
        
        echo
        Highcharts::widget([
            'clientOptions' => [
            'chart'=>[
                'type'=>'bar'
            ],
            'title' => ['text' => 'Data Berita'],
            'xAxis' => [
                'categories' => ['Jumlah']
            ],
            'yAxis' => [
                'title' => ['text' => 'Jumlah ']
            ],
            'series' => $b
            ]
        ]); 
    ?>  
</div>
