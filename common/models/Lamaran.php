<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;

class Lamaran extends ActiveRecord
{
    public static function tableName()
    {
        return 'lamaran';
    }

    
    public function rules()
    {
        return [
            [['nama', 'tempat_lahir', 'tanggal_lahir', 'pendidikan', 'jurusan', 'foto', 'foto_close_up', 'ijazah', 'surat_lamaran', 'alasan'], 'required'],
            [['tanggal_lahir'], 'safe'],
            [['foto', 'foto_close_up', 'ijazah', 'surat_lamaran', 'alasan'], 'string'],
            [['created_at'], 'integer'],
            [['nama'], 'string', 'max' => 50],
            [['tempat_lahir', 'jurusan'], 'string', 'max' => 20],
            [['pendidikan'], 'string', 'max' => 5],
            [['foto_close_up'], 'image', 'skipOnEmpty' => true, 'extensions' => 'jpg, png', 'maxSize' => 2024*2024],
            ['foto', 
            'image', 
            'minWidth' => 400, 
            'maxWidth' => 400,
            'minHeight' => 600, 
            'maxHeight' => 600, 
            'extensions' => 'jpg, gif, png', 
            'maxSize' => 2024 * 2024],
            [['ijazah', 'surat_lamaran',], 'file', 'skipOnEmpty' => true, 'extensions' => 'pdf', 'maxSize' => 2024*2024],

        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama' => 'Nama',
            'tempat_lahir' => 'Tempat Lahir',
            'tanggal_lahir' => 'Tanggal Lahir',
            'pendidikan' => 'Pendidikan Terakhir',
            'jurusan' => 'Jurusan',
            'foto' => 'Foto 4x6',
            'foto_close_up' => 'Foto Close Up',
            'ijazah' => 'Ijazah',
            'surat_lamaran' => 'Surat Lamaran',
            'alasan' => 'Alasan',
            'created_at' => 'Created At',
        ];
    }
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at'],
                    // ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
            ],
        ];
    }


}
