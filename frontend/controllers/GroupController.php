<?php

namespace frontend\controllers;

use Yii;
use common\models\group\Group;
use common\models\GroupSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\proposal\Proposal;
use \common\models\assignment\LeaderAssignment;
use \common\models\assignment\MemberAssignment;
use \common\models\assignment\SupervisiorAssignment;
use \common\models\proposalRevision\ProposalRevision;
/**
 * GroupController implements the CRUD actions for Group model.
 */
class GroupController extends Controller {

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
     * Lists all Group models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new GroupSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('group_index/index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }
    
    public function actionMemberlist($q = null, $id = null) {
    \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
    $out = ['results' => ['id' => '', 'text' => '']];
    if (!is_null($q)) {       
        $query = new Query;
        $query->select('dim_id, nama AS text')
            ->from('tpkm_students')
            ->where(['like', 'nama', $q])
            ->limit(20);
        $command = $query->createCommand();
        $data = $command->queryAll();
        $out['results'] = array_values($data);
    }
    elseif ($id > 0) {
        $out['results'] = ['id' => $id, 'text' => \common\models\students\Students::find($id)->name];
    }
    return $out;
    }

    /**
     * Displays a single Group model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        
        
        
        $proposal = Proposal::findOne(['id_group' => $id]);
        
        if ($proposal->load(Yii::$app->request->post()) && $proposal->save()) {
            return $this->redirect(['view', 'id' => $id]);
        }

        $students_assgnment = MemberAssignment::find()->where(['id_group' => $id]);
        $DataProviderStudents = new \yii\data\ActiveDataProvider(
                [
            'query' => $students_assgnment,
            'pagination' => ['pageSize' => 10]
                ]
        );
        
        $leader = Yii::$app->db->createCommand('SELECT id_students FROM tpkm_leader_assignment where id_group= '.$id)->queryScalar();                
        $member = Yii::$app->db->createCommand('SELECT id_students FROM tpkm_member_assignment where id_group= '.$id)->queryColumn();                
        $supervisior  = Yii::$app->db->createCommand('SELECT id_supervisior FROM tpkm_supervisior_assignment where id_group= '.$id)->queryScalar();
        
        $akses = 0;
        if(Yii::$app->user->isGuest){
            $akses = 0;
        }
        
        //Hak Akses
        $Hakakses = [];
        
        $j=0;
        foreach ($member as $i){
            $Hakakses[$j] = $i;
            $j++;
        }
        
        $Hakakses[2] = $leader;
        $Hakakses[3] = $supervisior;
        
        $id_user;
        
        if(!Yii::$app->user->isGuest){
        if (\common\models\students\Students::find()->where(['user_id' => Yii::$app->user->id])->one() != null) {
            $id_user = \common\models\students\Students::find()->where(['user_id' => Yii::$app->user->id])->one()->dim_id;
            if($id_user == $Hakakses[0] || $id_user==$Hakakses[1] || $id_user==$Hakakses[2]){
               $akses = 1;
            }
        } 
        else{
            $id_user = \common\models\pegawai\Pegawai::find()->where(['user_id' =>Yii::$app->user->id])->one()->pegawai_id;
            if($id_user==$Hakakses[3]){            
                $akses = 2;
            }        
        }
        }
        
        $supervisior_assgnment = SupervisiorAssignment::findOne(['id_group' => $id]);       
        $leader_assgnment = LeaderAssignment::findOne(['id_group' => $id]);       

        $proposalRevision = ProposalRevision::find()->where(['id_proposal' => $proposal->id]);

        $DataProviderProposalRevision = new \yii\data\ActiveDataProvider(
                [
            'query' => $proposalRevision,
        ]);


        return $this->render('view/view', [
                    'model' => $this->findModel($id),
                    'modelStudents' => $DataProviderStudents,
                    'modelSupervisior' => $supervisior_assgnment,
                    'modelLeader' => $leader_assgnment,
                    'proposal' => $proposal,
                    'proposalRevision' => $DataProviderProposalRevision,
                    'akses'=>$akses
        ]);
    }

    /**
     * Creates a new Group model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Group();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Group model.
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
     * Deletes an existing Group model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Group model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Group the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Group::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionJsonlist($q = NULL, $id = NULL)
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $out = ['results' => ['id' => '',
            'Nim' => '',
            'Nama' => '']];
        
        if(!is_null($q))
        {
            $query = new \yii\db\Query;
            $mainQuery = $query->select('dim_id as id, nim as Nim, nama AS Nama')
                               ->from('tpkm_students')
                               ->where(['like', 'nama', $q])
                               ->limit(20);
            $command = $mainQuery->createCommand();
            $data = $command->queryAll();
            $out['results'] = array_values($data);
        }
        elseif ($id > NULL)
        {
            $out['results'] = ['id' => $id,
                'Nim' => \frontend\models\Pemilik::find($id)->nim,
                'Nama' => \frontend\models\Pemilik::find($id)->nama];
        }
        return $out;
    }
    
    public function actionRegister() {
        $modelMember = [new \common\models\assignment\MemberAssignment()];
        $model = new Group();
        $supervisior = new \common\models\assignment\SupervisiorAssignment();

        $post = Yii::$app->request->post();
        if ($model->load($post) && $model->save()) {
            $postModel = $post['Group'];
            $postModelMulti = $postModel['nim_user'];

            if (!empty($postModelMulti)) {
                foreach ($postModelMulti as $key => $value) {
                    $newModel = new \common\models\assignment\MemberAssignment();
                    $newModel->id_students = $value;
                    $newModel->id_group = $model->id;
                    $newModel->save();
                }
            }
            $leader = new LeaderAssignment();
            $leader->id_group = $model->id;
            $leader->id_students = $model->leader;
            $leader->save();
            
            $proposal = new Proposal();
            $proposal->id_group = $model->id;
            $proposal->id_category = $model->category;
            $proposal->save();

            $supervisior->id_group = $model->id;
            $supervisior->id_supervisior = $model->supervisior;
            $supervisior->save();            
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('register/registration', [
                        'model' => $model,
                        'modelMember' => (empty($modelMember)) ? [new \common\models\assignment\StudentsAssignment] : $modelMember,
                        'supervisior' => $supervisior,
            ]);
        }
    }
}
