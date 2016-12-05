<?php

namespace frontend\controllers;

use Yii;
use common\models\announcement\Announcement;
use common\models\announcement\AnnouncementSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use \common\models\announcement\AnnouncementFile;

/**
 * AnnouncementController implements the CRUD actions for Announcement model.
 */
class AnnouncementController extends Controller {

    public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Announcement models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new AnnouncementSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        
        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Announcement model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        $file = AnnouncementFile::find()->where(['id_announcement'=>$id]);
        
        $files = new \yii\data\ActiveDataProvider([
            'query'=>$file,
        ]);
        
        return $this->render('view', [
                    'model' => $this->findModel($id),
                    'file'=>$files,
        ]);
    }

    /**
     * Creates a new Announcement model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {

        $model = new Announcement();

        if ($model->load(Yii::$app->request->post())) {
            $date = date('Y-m-d H:i:s');
            $postfix = Yii::$app->security->generateRandomString(4);
            $model->user_id = Yii::$app->user->id;
            $model->file = UploadedFile::getInstances($model, 'file');
            $model->start_date = $date;
            $model->save();
            //die($model->id);
            if ($model->file) {
                foreach ($model->file as $key => $file) {
                    $filename = $postfix . '_' . $file->name;
                    $file->saveAs(Yii::getAlias('upload/') . 'announcement/' . $filename);
                    $file_announcement = new AnnouncementFile();
                    $file_announcement->id_announcement = $model->id;
                    $file_announcement->file_location = $filename;
                    if ($file_announcement->save()) {
                        return $this->goHome();
                    }
                }
            }
            
             return $this->goHome();
            
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
        

//        if ($model->load(Yii::$app->request->post()) && $model->save()) {
//            return $this->redirect(['view', 'id' => $model->id]);
//        } else {
//            return $this->render('create', [
//                        'model' => $model,
//            ]);
//        }
    }
    
    public function actionDownload($nama) {
        $path = Yii::getAlias('@webroot'.'/upload/announcement/');        
        $file = $path.$nama;        
        if(file_exists($file)){
           return Yii::$app->response->sendFile($file);
        }
        else{
            throw new NotFoundHttpException('The file does not exist');
        }
    }    
    /**
     * Updates an existing Announcement model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        
        if(Yii::$app->user->can('supervisior')){
            $model = $this->findModel($id);

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                return $this->render('update', [
                            'model' => $model,
                ]);
            }
        }
        else {

            throw new \yii\web\ForbiddenHttpException;
        }
    }

    /**
     * Deletes an existing Announcement model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Announcement model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Announcement the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Announcement::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
