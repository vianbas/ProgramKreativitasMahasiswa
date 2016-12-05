<?php

namespace frontend\controllers;

use Yii;
use common\models\proposal\Proposal;
use common\models\proposal\ProposalSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ProposalController implements the CRUD actions for Proposal model.
 */
class ProposalController extends Controller {

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
     * Lists all Proposal models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new ProposalSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Proposal model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Proposal model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Proposal();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Proposal model.
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
     * Deletes an existing Proposal model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Proposal model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Proposal the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Proposal::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionFinal($id) {
        $model = $this->findModel($id);
        $model->finalization = 1;
        $model->save();       
        $leader = Yii::$app->db->createCommand('SELECT user_id FROM tpkm_students s JOIN tpkm_leader_assignment  l ON s.dim_id = l.id_students WHERE id_group= ' . $id)->queryScalar();
        $member = Yii::$app->db->createCommand('SELECT user_id FROM tpkm_students s JOIN tpkm_member_assignment  l ON s.dim_id = l.id_students WHERE id_group=  ' . $id)->queryColumn();
        $supervisior = Yii::$app->db->createCommand('SELECT user_id FROM tpkm_pegawai s JOIN tpkm_supervisior_assignment l ON s.pegawai_id = l.id_supervisior WHERE id_group= ' . $id)->queryScalar();
        $user = \common\models\User::findOne(Yii::$app->user->id);
        
        $notif = " Your proposal set to be Final by ".$user->username;
        $Hakakses = [];
        $Hakakses[0] = $member[0];
        $Hakakses[1] = $member[1];
        $Hakakses[2] = $leader;
        $id_user;
        if (\common\models\students\Students::find()->where(['user_id' => Yii::$app->user->id])->one() != null) {
            $id_user = \common\models\students\Students::find()->where(['user_id' => Yii::$app->user->id])->one()->dim_id;
        } 
//        else {
//            $id_user = \common\models\pegawai\Pegawai::find()->where(['user_id' => Yii::$app->user->id])->one()->pegawai_id;
//      
//            if($id_user!=$supervisior){
//                $supervisior_id = \common\models\pegawai\Pegawai::findOne($supervisior);
//                $notification = new Notification();
//                $notification->key = $notif;
//                $notification->key_id = $id;
//                $notification->type = 'group/view';
//                $notification->user_id = $supervisior_id->user_id;
//                $notification->created_at = date("Y-m-d H:m:s");
//                $notification->seen = 0;
//                $notification->save();
//            }
//        }
//        
        foreach ($Hakakses as $value) {                
                $notification = new Notification();
                $notification->key = $notif;
                $notification->key_id = $id;
                $notification->type = 'group/view';

                $notification->user_id = $value;
                $notification->created_at = date("Y-m-d H:m:s");
                $notification->seen = 0;
                $notification->save();
          
        }

        Yii::$app->session->setFlash('succcess','success you set this proposal to be final');
        return $this->redirect([
                    'group/view','id'=>$id
        ]);
    }

    public function actionCancel($id) {
        $model = $this->findModel($id);
        $model->finalization = 2;
        $model->save();

        $leader = Yii::$app->db->createCommand('SELECT user_id FROM tpkm_students s JOIN tpkm_leader_assignment  l ON s.dim_id = l.id_students WHERE id_group= ' . $id)->queryScalar();
        $member = Yii::$app->db->createCommand('SELECT user_id FROM tpkm_students s JOIN tpkm_member_assignment  l ON s.dim_id = l.id_students WHERE id_group=  ' . $id)->queryColumn();
        $supervisior = Yii::$app->db->createCommand('SELECT user_id FROM tpkm_pegawai s JOIN tpkm_supervisior_assignment l ON s.pegawai_id = l.id_supervisior WHERE id_group= ' . $id)->queryScalar();

        $user = \common\models\User::findOne(Yii::$app->user->id);
        $notif = " Your proposal canceled by ".$user->username;
        $Hakakses = [];
        $Hakakses[0] = $member[0];
        $Hakakses[1] = $member[1];
        $Hakakses[2] = $leader;
        $id_user;
        if (\common\models\students\Students::find()->where(['user_id' => Yii::$app->user->id])->one() != null) {
            $id_user = \common\models\students\Students::find()->where(['user_id' => Yii::$app->user->id])->one()->dim_id;
        } 
//        else {
//            $id_user = \common\models\pegawai\Pegawai::find()->where(['user_id' => Yii::$app->user->id])->one()->pegawai_id;
//      
//            if($id_user!=$supervisior){
//                $supervisior_id = \common\models\pegawai\Pegawai::findOne($supervisior);
//                $notification = new Notification();
//                $notification->key = $notif;
//                $notification->key_id = $id;
//                $notification->type = 'group/view';
//                $notification->user_id = $supervisior_id->user_id;
//                $notification->created_at = date("Y-m-d H:m:s");
//                $notification->seen = 0;
//                $notification->save();
//            }
//        }
//        
        foreach ($Hakakses as $value) {
          
                $notification = new Notification();
                $notification->key = $notif;
                $notification->key_id = $id;
                $notification->type = 'group/view';
                $notification->user_id = $value;
                $notification->created_at = date("Y-m-d H:m:s");
                $notification->seen = 0;
                $notification->save();          
        }

        Yii::$app->session->setFlash('succcess','success you set this proposal to be final');
        return $this->redirect([
                    'group/view','id'=>$id
        ]);
    }

    public function actionDikti($id) {
        $model = $this->findModel($id);

        $model->pkm_dikti = 1;
        $model->save();
        
        $leader = Yii::$app->db->createCommand('SELECT user_id FROM tpkm_students s JOIN tpkm_leader_assignment  l ON s.dim_id = l.id_students WHERE id_group= ' . $id)->queryScalar();
        $member = Yii::$app->db->createCommand('SELECT user_id FROM tpkm_students s JOIN tpkm_member_assignment  l ON s.dim_id = l.id_students WHERE id_group=  ' . $id)->queryColumn();
        $supervisior = Yii::$app->db->createCommand('SELECT user_id FROM tpkm_pegawai s JOIN tpkm_supervisior_assignment l ON s.pegawai_id = l.id_supervisior WHERE id_group= ' . $id)->queryScalar();

        $user = \common\models\User::findOne(Yii::$app->user->id);
        $notif = "Congratulation Your proposal accepted in Dikti";
        $Hakakses = [];
        $Hakakses = [];
        $Hakakses[0] = $member[0];
        $Hakakses[1] = $member[1];
        $Hakakses[2] = $leader;
        $id_user;
        if (\common\models\students\Students::find()->where(['user_id' => Yii::$app->user->id])->one() != null) {
            $id_user = \common\models\students\Students::find()->where(['user_id' => Yii::$app->user->id])->one()->dim_id;
        } 
//        else {
//            $id_user = \common\models\pegawai\Pegawai::find()->where(['user_id' => Yii::$app->user->id])->one()->pegawai_id;
//      
//            if($id_user!=$supervisior){
//                $supervisior_id = \common\models\pegawai\Pegawai::findOne($supervisior);
//                $notification = new Notification();
//                $notification->key = $notif;
//                $notification->key_id = $id;
//                $notification->type = 'group/view';
//                $notification->user_id = $supervisior_id->user_id;
//                $notification->created_at = date("Y-m-d H:m:s");
//                $notification->seen = 0;
//                $notification->save();
//            }
//        }
//        
        foreach ($Hakakses as $value) {
          
                $id_students = \common\models\students\Students::findOne($value);
                $notification = new Notification();
                $notification->key = $notif;
                $notification->key_id = $id;
                $notification->type = 'group/view';
                $notification->user_id = $value;
                $notification->created_at = date("Y-m-d H:m:s");
                $notification->seen = 0;
                $notification->save();
          
        }

        Yii::$app->session->setFlash('succcess','success you set this proposal to be final');
        return $this->redirect([
                    'group/view','id'=>$id
        ]);
    }

}
