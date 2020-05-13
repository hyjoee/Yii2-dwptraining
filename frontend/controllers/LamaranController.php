<?php

namespace frontend\controllers;

use Yii;
use common\models\Lamaran;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\Pagination;
use yii\web\UploadedFile;


class LamaranController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
            ],
        ];
    }
    public function actionIndex()
    {
        $model = new Lamaran();

        if ($model->load(Yii::$app->request->post())) {

            try{
                    $foto = UploadedFile::getInstance($model,'foto');
                    $foto_close_up = UploadedFile::getInstance($model,'foto_close_up');
                    $ijazah = UploadedFile::getInstance($model,'ijazah');
                    $surat_lamaran = UploadedFile::getInstance($model,'surat_lamaran');

                    if(isset($foto->size)){
                        $foto->saveAs(Yii::getAlias('@backend/web/uploads_foto/').$foto->basename.'.'.$foto->extension);
                    }
                    if(isset($foto_close_up->size)){
                        $foto_close_up->saveAs(Yii::getAlias('@backend/web/uploads_foto_close_up/').$foto_close_up->basename.'.'.$foto_close_up->extension);
                    }
                    if(isset($ijazah->size)){
                        $ijazah->saveAs(Yii::getAlias('@backend/web/uploads_ijazah/').$ijazah->basename.'.'.$ijazah->extension);
                    }
                    if(isset($surat_lamaran->size)){
                        $surat_lamaran->saveAs(Yii::getAlias('@backend/web/uploads_surat_lamaran/').$surat_lamaran->basename.'.'.$surat_lamaran->extension);
                    }
                    
                    $model->foto = $foto->basename.'.'.$foto->extension;
                    $model->foto_close_up = $foto_close_up->basename.'.'.$foto_close_up->extension;
                    $model->ijazah = $ijazah->basename.'.'.$ijazah->extension;
                    $model->surat_lamaran = $surat_lamaran->basename.'.'.$surat_lamaran->extension;

                if($model->save()){
                    Yii::$app->getSession()->setFlash(
                        'success','Data Terkirim'
                    );
                    return $this->redirect(['index']);
                }
            }catch(Exception $e){
                Yii::$app->getSession()->setFlash(
                    'error',"{$e->getMessage()}"
                );
            }
            
        }

        
        return $this->render('index', [
            'model' => $model,
        ]);
    }
}
