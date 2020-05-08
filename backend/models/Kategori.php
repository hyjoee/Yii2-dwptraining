<?php

namespace backend\models;
use Yii;
use yii\db\ActiveRecord;

/**
 * 
 */
class Kategori extends ActiveRecord
{
	
	public static function tableName(){
		return 'kategori';
	}
	
	public function rules(){
		return [
			[['nama','keterangan'],'required'],
			[['nama','keterangan'],'string'],
		];
	}
}