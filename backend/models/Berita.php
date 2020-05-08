<?php

namespace backend\models;

use Yii;

use common\models\User;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

class Berita extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $files; 
    public $serialize; 

    public static function tableName()
    {
        return 'berita';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            
            [['judul', 'jenis_berita_id', 'isi_berita'], 'required'],
            [['jenis_berita_id'], 'integer'],
            [['isi_berita'], 'string'],
            [['file_lampiran'], 'file', 'skipOnEmpty' => true, 'extensions' => 'gif, jpg, png, pdf, doc, docx', 'maxFiles' => 10],
            [['judul'], 'string', 'max' => 255],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['updated_by' => 'id']],
            [['jenis_berita_id'], 'exist', 'skipOnError' => true, 'targetClass' => Kategori::className(), 'targetAttribute' => ['jenis_berita_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'judul' => 'Judul',
            'jenis_berita_id' => 'Kategori Id',
            'isi_berita' => 'Isi Berita',
            'file_lampiran' => 'File Lampiran',
        ];
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
                // if you're using datetime instead of UNIX timestamp:
                 //'value' => new Expression('NOW()'),
            ],
        ];
    }

    /**
     * Gets query for [[CreatedBy]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }

    /**
     * Gets query for [[UpdatedBy]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUpdatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'updated_by']);
    }

    /**
     * Gets query for [[JenisBerita]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getJenisBerita()
    {
        return $this->hasOne(Kategori::className(), ['id' => 'jenis_berita_id']);
    }

    /**
     * Gets query for [[Komentars]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getKomentars()
    {
        return $this->hasMany(Komentar::className(), ['berita_id' => 'id']);
    }
}
