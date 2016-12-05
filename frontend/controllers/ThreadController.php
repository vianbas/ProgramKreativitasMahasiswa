<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Thread;
use frontend\models\ThreadSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ThreadController implements the CRUD actions for Thread model.
 */
class ThreadController extends Controller {

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
     * Lists all Thread models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new ThreadSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Thread model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        $post = \frontend\models\Post::find()->where(['thread_id' => $id]);
        $dataProvider = new \yii\data\ActiveDataProvider([
            'query' => $post,
        ]);

        return $this->render('view', [
                    'model' => $this->findModel($id),
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new Thread model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Thread();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $model->author_id = Yii::$app->user->id;
            $model->created = date('Y-m-d H:m:s');
            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    public function actionCreateThread($id){
        if(Yii::$app->user->isGuest){
            return $this->redirect(['site/login']);
        }
        
        $model = new Thread();
        
        if ($model->load(Yii::$app->request->post())) {
            $model->author_id = Yii::$app->user->id;            
            $model->created = Date('Y-m-d H:m:s');
            $model->forum_id = $id;
            if ($model->save()) {
                $post = new \frontend\models\Post();
                $post->thread_id = $model->id;
                $post->author_id = Yii::$app->user->id;
                $post->content = $model->content;
                if($post->save()){                    
                    return $this->redirect(['view', 'id' => $model->id]);                
                }
            }
        } 
        else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Thread model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
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
     * Deletes an existing Thread model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Thread model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Thread the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Thread::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
