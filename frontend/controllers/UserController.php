<?php

namespace frontend\controllers;

use Yii;
use frontend\models\User;
use frontend\models\UserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
{
    public function behaviors()
    {
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
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single User model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new User();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    public function actionUpdates()
    {

        $id = Yii::$app->user->id;
        $model = \common\models\students\Students::findOne($id);

        if ($model->load(Yii::$app->request->post())) {
            
            $model->file = UploadedFile::getInstance($model,'file');            
            if($model->file){
                $imagepath = 'upload/foto/';
                $model->foto = $imagepath.rand(10,100).$model->file->name;                
            }
            if($model->save()){
                if($model->file){                    
                    $model->file->saveAs($model->foto);
                }
            }
            Yii::$app->session->setFlash('success','You have succesfully update your profile');
             return $this->render('update', [
                'model' => $model,
               ]);
        }else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }
    
    public function actionChange_password()
    {
        $user = Yii::$app->user->identity;                
        $model = new \common\models\ChangePassword();
        $loadedpost = $model->load(Yii::$app->request->post());
        if ($loadedpost){
            if($model->validate()){            
                $user->setPassword($model->newPassword);
                $user->save(false);
                Yii::$app->session->setFlash('success','You have succesfully changed your password');
                return $this->refresh();
            }
        }
        return $this->render('change_password', [
             'user' => $model,
        ]);        
    }
}
