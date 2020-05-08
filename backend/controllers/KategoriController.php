<?php

namespace backend\controllers;
use yii\web\controller;
use yii\data\Pagination;
use yii;
use backend\models\Kategori;
use yii\helpers\Url;

/**
 * 
 */
class KategoriController extends controller
{
	public function actionEntry(){
		$model = new Kategori();
		$kategori = Kategori::find()->all();
		if ($model->load(Yii::$app->request->post()) && $model->save()) {
			return $this->redirect(['index']);
		}
		else{
			return $this->render('entry',['model'=>$model]);
		}
	}

	public function actionIndex(){
		 // $model = Kategori::find()->where(['id'=>4]);
		 $model = Kategori::find();
		 $pagination = new Pagination(
		 	[
		 		'defaultPageSize'=>5,
		 		'totalCount'=>$model->count(),
		 	]
		 );

		 $kategori = $model->orderBy('nama')
		 ->offset($pagination->offset)
		 ->limit($pagination->limit)
		 ->all();

		 return $this->render('index',[
		 	'select'=>$kategori,
		 	'page'=>$pagination,
		 ]);
	}
	public function actionDelete($id){
		$model = Kategori::findOne($id);
		$model -> delete();
		return $this->redirect(['index']);
	}

	public function actionEdit($id){
		$model = Kategori::findOne($id);
		
		if ($model->load(Yii::$app->request->post()) && $model->save()) {
			return $this->redirect(['index']);
		}
		else{
			return $this->render('edit',['model'=>$model]);
		}
	}
	protected function findModel($id)
    {
        if (($model = Kategori::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
