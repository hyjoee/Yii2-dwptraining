<?php

namespace backend\controllers;

use Yii;
use common\models\Mahasiswa;
use backend\models\MahasiswaSearch;
use backend\models\CsvForm;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\web\Spreadsheet_Excel_Reader;


/**
 * MahasiswaController implements the CRUD actions for Mahasiswa model.
 */
class MahasiswaController extends Controller
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
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Mahasiswa models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MahasiswaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionUpload(){
       
        $model = new CsvForm;
   
    if($model->load(Yii::$app->request->post())){
        $file = UploadedFile::getInstance($model,'file');
        $filename = 'Data.'.$file->extension;
        $upload = $file->saveAs('dataexcel/'.$filename);
        if($upload){
            define('CSV_PATH','dataexcel/');
            $csv_file = CSV_PATH . $filename;
            $filecsv = file($csv_file);
            print_r($filecsv);
            foreach($filecsv as $data){
                $modelnew = new Mahasiswa;
                $hasil = explode(";",$data);
                $id = $hasil[0];
                $nama = $hasil[1];
                $kelas = $hasil[2];
                
                $modelnew->id = $nim;
                $modelnew->nama = $nama;
                $modelnew->kelas = $kelas;
                
                $modelnew->save(false);
                
            }
            unlink('dataexcel/'.$filename);
            return $this->redirect(['mahasiswa/index']);
        }
    }else{
        return $this->render('upload',['model'=>$model]);
    }
}

    /**
     * Displays a single Mahasiswa model.
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
     * Creates a new Mahasiswa model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Mahasiswa();
        if ($model->load(Yii::$app->request->post())) {
           
            // $imageFile = UploadedFile::getInstance($model,'gabungan');
            // if(isset($imageFile->size)){
            //     $imageFile->saveAs('uploads/'.$imageFile->basename.'.'.$imageFile->extension);
            // }
          
            // $model->gabungan = $imageFile->basename.'.'.$imageFile->extension;
            $model->save();
            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Mahasiswa model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Mahasiswa model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Mahasiswa model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Mahasiswa the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Mahasiswa::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
