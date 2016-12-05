<?php

namespace frontend\controllers;

use Yii;
use common\models\proposalRevision\ProposalRevision;
use common\models\proposalRevision\ProposalRevisionSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use \common\models\proposalRevision\ProposalRevisionComment;
use \common\models\notif\Notification;
/**
 * ProposalRevisionController implements the CRUD actions for ProposalRevision model.
 */

class ProposalRevisionController extends Controller {

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
     * Lists all ProposalRevision models.
     * @return mixed
     */
    public function actionIndex(){
        $searchModel = new ProposalRevisionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }
    
    

    /**
     * Displays a single ProposalRevision model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id) {        
        if(Yii::$app->user->isGuest){          
           return $this->redirect(['site/login']);            
        }
        

                
        $comment = ProposalRevisionComment::find()->where(['id_proposal_revision' => $id]);

        $newcomment = new ProposalRevisionComment();

        if ($newcomment->load(Yii::$app->request->post())) {
            $newcomment->id_proposal_revision = $id;
            $newcomment->user_id = Yii::$app->user->id;
            $dates = date("Y-m-d H:i:s");
            $newcomment->date = $dates;
            $newcomment->save();             
            
            $proposalRevision = ProposalRevision::findOne($id);
            $proposal = \common\models\proposal\Proposal::findOne($proposalRevision->id_proposal);
                        
            $leader = Yii::$app->db->createCommand('SELECT user_id FROM tpkm_students s JOIN tpkm_leader_assignment  l ON s.dim_id = l.id_students WHERE id_group= '.$proposal->id_group)->queryScalar();                
            $member = Yii::$app->db->createCommand('SELECT user_id FROM tpkm_students s JOIN tpkm_member_assignment  l ON s.dim_id = l.id_students WHERE id_group=  '.$proposal->id_group)->queryColumn();                
            $supervisior  = Yii::$app->db->createCommand('SELECT user_id FROM tpkm_pegawai s JOIN tpkm_supervisior_assignment l ON s.pegawai_id = l.id_supervisior WHERE id_group= '.$proposal->id_group)->queryScalar();
            
            $user = \common\models\User::findOne(Yii::$app->user->id);
            
            $notif = $user->username." Comment your Proposal";
            
            $Hakakses = [];
        
            $Hakakses[0] = $member[0];
            $Hakakses[1] = $member[1];
            $Hakakses[2] = $leader;
            $Hakakses[3] = $supervisior;
            
            $id_user;
            
            if (\common\models\students\Students::find()->where(['user_id' => Yii::$app->user->id])->one() != null) {
                    $id_user = \common\models\students\Students::find()->where(['user_id' => Yii::$app->user->id])->one()->dim_id;
            } 
            else{
                    $id_user = \common\models\pegawai\Pegawai::find()->where(['user_id' =>Yii::$app->user->id])->one()->pegawai_id;
            }
            
            foreach ($Hakakses as $value) {
                if($id_user != $value){
                  $notification = new Notification();
                  $notification->key = $notif;
                  $notification->key_id = $id;
                  $notification->type = 'proposal-revision/view';
                  $notification->user_id = $value;
                  $notification->created_at = date("Y-m-d H:m:s");
                  $notification->seen = 0;  
                  $notification->save();
                }
            }           
            return $this->redirect(['proposal-revision/view', 'id' => $id]);
        }

        $dataProviderComment = new \yii\data\ActiveDataProvider(
        [
            'query' => $comment,
            'sort'=>['defaultOrder'=>['date'=>SORT_ASC]],
        ]);

        return $this->render('proposal-revision-comment/index', [
                    'model' => $this->findModel($id),
                    'dataProviderComment' => $dataProviderComment,
                    'newcomment' => $newcomment,
        ]);
    }


    /**
     * Creates a new ProposalRevision model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id) {
        
        if(Yii::$app->user->isGuest){        
            return $this->redirect(['site/login']);
        }
        
        $proposal = \common\models\proposal\Proposal::findOne(['id'=>$id]);
        
        $group = \common\models\group\Group::findOne(['id'=>$proposal->id_group]);
        
        
        $leader = Yii::$app->db->createCommand('SELECT id_students FROM tpkm_leader_assignment where id_group= '.$group->id)->queryScalar();                
        $member = Yii::$app->db->createCommand('SELECT id_students FROM tpkm_member_assignment where id_group= '.$group->id)->queryColumn();                
        $supervisior  = Yii::$app->db->createCommand('SELECT id_supervisior FROM tpkm_supervisior_assignment where id_group= '.$group->id)->queryScalar();
        
        //Hak Akse
        $Hakakses = [];
        
        $Hakakses[0] = $member[0];
        $Hakakses[1] = $member[1];
        $Hakakses[2] = $leader;
        $Hakakses[3] = $supervisior;
        
        $id_user;
        if (\common\models\students\Students::find()->where(['user_id' => Yii::$app->user->id])->one() != null) {
                    $id_user = \common\models\students\Students::find()->where(['user_id' => Yii::$app->user->id])->one()->dim_id;
        } 
        else{
                    $id_user = \common\models\pegawai\Pegawai::find()->where(['user_id' =>Yii::$app->user->id])->one()->pegawai_id;
        }
        
        if($id_user == $Hakakses[0] || $id_user==$Hakakses[1] || $id_user==$Hakakses[2] || $id_user == $Hakakses[3] )
        {
        
        $model = new ProposalRevision();

        if ($model->load(Yii::$app->request->post())) {
            $model->id_proposal = $id;
            $model->save();
            
            $modelProposal = \common\models\proposal\Proposal::findOne($id);
            $modelProposal->id_category = $model->id_category;
            $modelProposal->abstaction = $model->abstraction;
            
            $modelProposal->topic = $model->topic;
            
            $modelProposal->save();
            
            $postfix = Yii::$app->security->generateRandomString(8);
            $model->file = UploadedFile::getInstances($model, 'file');

            if ($model->file) {
                $filename = $postfix . '_' . rand(100, 89765) . $model->file[0]->name;
                $name = Yii::getAlias('upload/') . 'proposal/2016/' . $filename;
                $model->file[0]->saveAs($name);
                $file_proposal = new \common\models\proposal\ProposalFile();
                $file_proposal->id_proposal_revision = $model->id;
                $file_proposal->uploaded_at = date("Y:m:d H:m:s");
                $file_proposal->uploaded_by = Yii::$app->user->id;
                $file_proposal->file_location = $filename;
                $file_proposal->save();
            }
            return $this->redirect(['group/view', 'id' => $id]);
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
        }
    else{
        return $this->redirect(['site/login']);
    }
    }

    /**
     * Updates an existing ProposalRevision model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
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
     * Deletes an existing ProposalRevision model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ProposalRevision model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return ProposalRevision the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = ProposalRevision::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    public function actionDownload($nama) {        
 
        if(Yii::$app->user->isGuest){
            return $this->redirect(['site/login']);
        }
        
        $path = Yii::getAlias('@webroot'.'/upload/proposal/2016/');
        
        $file = $path.$nama;
        
        if(file_exists($file)){
           return Yii::$app->response->sendFile($file);
        }
        else{
            throw new NotFoundHttpException('The file does not exist');
        }
    }    
}
