<?php

namespace backend\controllers;

use Yii;
use common\models\Lamaran;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\Pagination;
use yii\web\UploadedFile;



/**
 * LamaranController implements the CRUD actions for Lamaran model.
 */
class LamaranController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST','GET'],
                ],
            ],
        ];
    }

    /**
     * Lists all Lamaran models.
     * @return mixed
     */
    public function actionIndex()
    {
        $model = Lamaran::find();
        $pagination = new Pagination(
            [
                'defaultPageSize'=>5,
                'totalCount'=>$model->count(),
            ]
        );

        $lamaran = $model->orderBy('id')
        ->offset($pagination->offset)
        ->limit($pagination->limit)
        ->all();

        return $this->render('index',[
            'select'=>$lamaran,
            'page'=>$pagination,
        ]);
    }

    /**
     * Displays a single Lamaran model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Lamaran model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Lamaran();

        if ($model->load(Yii::$app->request->post())) {

            try{
                    
                    $foto = UploadedFile::getInstance($model,'foto');
                    $foto_close_up = UploadedFile::getInstance($model,'foto_close_up');
                    $ijazah = UploadedFile::getInstance($model,'ijazah');
                    $surat_lamaran = UploadedFile::getInstance($model,'surat_lamaran');

                    if(isset($foto->size)){
                        $foto->saveAs('uploads_foto/'.$foto->basename.'.'.$foto->extension);
                    }
                    if(isset($foto_close_up->size)){
                        $foto_close_up->saveAs('uploads_foto_close_up/'.$foto_close_up->basename.'.'.$foto_close_up->extension);
                    }
                    if(isset($ijazah->size)){
                        $ijazah->saveAs('uploads_ijazah/'.$ijazah->basename.'.'.$ijazah->extension);
                    }
                    if(isset($surat_lamaran->size)){
                        $surat_lamaran->saveAs('uploads_surat_lamaran/'.$surat_lamaran->basename.'.'.$surat_lamaran->extension);
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
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Lamaran model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        
        if ($model->load(Yii::$app->request->post())) {
            // unlink('uploads_ijazah/'.$model->ijazah);
            //  unlink('uploads_surat_lamaran/Inheritance-Pewarisan.pdf'.$model->surat_lamaran);
            unlink(Yii::$app->basePath.'/web/uploads_surat_lamaran/'.$model->surat_lamaran);
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        }
        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Lamaran model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        // unlink('uploads_foto_close_up/'. $model->foto_close_up);
        return $this->redirect(['index']);
    }

    /**
     * Finds the Lamaran model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Lamaran the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Lamaran::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
