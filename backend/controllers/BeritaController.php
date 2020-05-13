<?php

namespace backend\controllers;

use Yii;
use backend\models\Berita;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;
use yii\filters\VerbFilter;
use yii\behaviors\TimestampBehavior;
use yii\data\Pagination;
use yii\db\Expression;
use yii\db\ActiveRecord;
use yii\behaviors\BlameableBehavior;


/**
 * BeritaController implements the CRUD actions for Berita model.
 */
class BeritaController extends Controller
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
     * Lists all Berita models.
     * @return mixed
     */
    public function actionIndex()
    {
        $model = Berita::find();
        $pagination = new Pagination(
            [
                'defaultPageSize'=>5,
                'totalCount'=>$model->count(),
            ]
        );

        $berita = $model->orderBy('id')
        ->offset($pagination->offset)
        ->limit($pagination->limit)
        ->all();

        return $this->render('index',[
            'select'=>$berita,
            'page'=>$pagination,
        ]);
    }

    /**
     * Displays a single Berita model.
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
     * Creates a new Berita model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Berita();

        if ($model->load(Yii::$app->request->post())) {

            $imageFile = UploadedFile::getInstance($model,'file_lampiran');
            if(isset($imageFile->size)){
                $imageFile->saveAs('uploads/'.$imageFile->basename.'.'.$imageFile->extension);
            }
            //  $model->created_at= time();
            // $model->created_at= date('yy m d');
            
            $model->file_lampiran = $imageFile->basename.'.'.$imageFile->extension;
            $model->save(false);
            return $this->redirect(['index']);
            
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Berita model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = Berita::findOne($id);
        $old_file = $model->file_lampiran;
        
		if ($model->load(Yii::$app->request->post())) {

            $imageFile = UploadedFile::getInstance($model,'file_lampiran');
            if(isset($imageFile->size)){
                $imageFile->saveAs('uploads/'.$imageFile->basename.'.'.$imageFile->extension);
                $model->file_lampiran = $imageFile->basename.'.'.$imageFile->extension;
            }
            else if (empty($model->namafile)){
                $model->file_lampiran = $old_file;
            }
            $model->save(false);
			return $this->redirect(['index']);
		}
		else{
			return $this->render('update',['model'=>$model]);
		}
    }


    /**
     * Deletes an existing Berita model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = Berita::findOne($id);
        //unlink(Yii::getAlias('@root') . 'uploads/'. $model->file_lampiran);
        //unlink(Yii::getAlias('../backend') . '/web/uploads/' . $model->file_lampiran);
		$model -> delete();
		return $this->redirect(['index']);
    }

    /**
     * Finds the Berita model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Berita the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Berita::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
