<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Post;
use frontend\models\PostSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PostController implements the CRUD actions for Post model.
 */
class PostController extends Controller
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
     * Lists all Post models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PostSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Post model.
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
     * Creates a new Post model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Post();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }
    
    public function actionReply($thread_id,$parent_id,$id)
    {
        if(Yii::$app->user->isGuest){
            return $this->redirect(['site/login']);
        }
        $model = new Post();
        
        $post  = $this->findModel($parent_id);

        $poss = Post::find()->where(['id'=>$parent_id]);
        $posts = new \yii\data\ActiveDataProvider([
            'query'=>$poss,
        ]);
               
        if ($model->load(Yii::$app->request->post())) {
            $model->author_id = Yii::$app->user->id;
            $model->thread_id = $thread_id;
            $model->parent_id = $parent_id;
            $model->created = Date('Y-m-d H:m:s');            
            
            $ids = Yii::$app->user->id;
            $user = \common\models\User::findOne($ids);
            $notif = $user->username." Reply Post in Your Post";
            $Member = [];
            $Member[0] = Yii::$app->db->createCommand('SELECT author_id FROM post WHERE thread_id = '.$thread_id)->queryScalar();
            $member = Yii::$app->db->createCommand('SELECT author_id FROM post WHERE thread_id = '.$parent_id)->queryScalar();
            if($member != $Member[0]){
                $Member[1] = $member;
            } 
            
            foreach ($Member as $value) {
                if(Yii::$app->user->id != $value){
                  $notification = new Notification();
                  $notification->key = $notif;
                  $notification->key_id = $id;
                  $notification->type = 'thread/view';
                  $notification->user_id = $value;
                  $notification->created_at = date("Y-m-d H:m:s");
                  $notification->seen = 0;  
                  $notification->save();
                }
            }            
            if($model->save()){
                
                return $this->redirect(['thread/view', 'id' => $model->thread_id]);                
            }
        }else {
            return $this->render('_reply', [
                'model' => $model,
                'post'=>$post,
                'posts'=>$posts,
            ]);
        }
    }

    /**
     * Updates an existing Post model.
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
     * Deletes an existing Post model.
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
     * Finds the Post model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Post the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Post::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
