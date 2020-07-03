<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "mahasiswa".
 *
 * @property int $id_mahasiswa
 * @property string $nama
 * @property int $kelas
 */
class Mahasiswa extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mahasiswa';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama', 'kelas'], 'required'],
            [['kelas'], 'integer'],
            [['nama'], 'string', 'max' => 50],
            // [['gabungan'], 'file', 'skipOnEmpty' => true, 'extensions' => 'gif, jpg, png, pdf, doc, docx', 'maxFiles' => 10],
            
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_mahasiswa' => 'Id Mahasiswa',
            'nama' => 'Nama',
            'kelas' => 'Kelas',
            // 'gabungan' => 'Gabungan',
        ];
    }
}
