<?php

namespace backend\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "komentar".
 *
 * @property int $id
 * @property int $berita_id
 * @property string $nama
 * @property string $email
 * @property string $isi_komentar
 * @property int|null $created_at
 *
 * @property Berita $berita
 */
class Komentar extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'komentar';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['berita_id', 'nama', 'email', 'isi_komentar'], 'required'],
            [['berita_id', 'created_at'], 'integer'],
            [['isi_komentar'], 'string'],
            [['nama', 'email'], 'string', 'max' => 255],
            [['berita_id'], 'exist', 'skipOnError' => true, 'targetClass' => Berita::className(), 'targetAttribute' => ['berita_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'berita_id' => 'Judul Berita',
            'nama' => 'Nama',
            'email' => 'Email',
            'isi_komentar' => 'Isi Komentar',
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
                // if you're using datetime instead of UNIX timestamp:
                 //'value' => new Expression('NOW()'),
            ],
        ];
    }

    /**
     * Gets query for [[Berita]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBerita()
    {
        return $this->hasOne(Berita::className(), ['id' => 'berita_id']);
    }
}
