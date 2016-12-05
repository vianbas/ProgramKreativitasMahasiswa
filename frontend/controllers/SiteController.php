<?php

namespace frontend\controllers;

use Yii;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\group\GroupRegistration;
use common\models\students\Students;
use common\models\assignment\StudentsAssignment;
use machour\yii2\notifications\models\Notification;
use common\models\announcement\AnnouncementSearch;
use common\models\announcement\Announcement;

/**
 * Site controller
 */
class SiteController extends Controller {

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions() {

        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex() {
        
        //pengumuman
        $searchModel = new AnnouncementSearch();
        $model = new Announcement();
        $announcement = Announcement::find();
        $post = \frontend\models\Post::find();
        $proposal = \common\models\proposal\Proposal::find();

        $dataProvider = new \yii\data\ActiveDataProvider([
            'query' => $announcement->limit(6),
            'sort' => ['defaultOrder' => ['id' => SORT_DESC]],
            'pagination' =>false,
        ]);
        
        $dataProviderProposal = new \yii\data\ActiveDataProvider([
            'query' => $proposal->limit(6),
            'sort' => ['defaultOrder' => ['id' => SORT_DESC]],
            'pagination' =>false,
        ]);
        
        $dataProviderPost = new \yii\data\ActiveDataProvider([
            'query' => $post->limit(4),
            'sort' => ['defaultOrder' => ['id' => SORT_DESC]],
            'pagination' =>false,
        ]);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'dataProviderProposal' => $dataProviderProposal,
                    'dataProviderPost' => $dataProviderPost,
        ]);
        
        
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin() {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout() {

        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact() {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending email.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout() {
        return $this->render('about');
    }

    public function actionDashboard() {     
        $searchModel = new \common\models\GroupSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $id_user = Yii::$app->user->id;

        if(Yii::$app->user->can('supervisior')){
            
            $id = \common\models\pegawai\Pegawai::findOne(['user_id' => $id_user])->nip;
            
            $group = \common\models\group\Group::find()
                    ->joinWith('tpkmSupervisiorAssignments')
                    ->where(['id_supervisior'=>$id]);

            $providerSupervisor = new \yii\data\ActiveDataProvider([
                'query' => $group,
            ]);

            return $this->render('dashboard/index', [
                        'searchModel' => $searchModel,
                        'dataProvider' => $providerSupervisor,
            ]);            
        }
        else{

            $id = Students::findOne(['user_id' => $id_user])->nim;
            $group = \common\models\group\Group::find()
                    ->joinWith('tpkmStudentsAssignments')
                    ->where(['id_students' => $id]);


            $p = new \yii\data\ActiveDataProvider([
                'query' => $group,
            ]);

            return $this->render('dashboard/index',[
                        'searchModel' => $searchModel,
                        'dataProvider' => $p,
            ]);
        } 
         
        
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup() {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
                    'model' => $model,
        ]);
    }
    
    public function actionProfile() {
         $searchModel = new \common\models\GroupSearch();
         $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

         $id_user = Yii::$app->user->id;

         if(Yii::$app->user->can('supervisior')){             
            $modelSupervisior = \common\models\pegawai\Pegawai::find()->where(['user_id'=>$id_user])->one();
            $id = \common\models\pegawai\Pegawai::findOne(['user_id' => $id_user])->nip;
            
            $user = \common\models\User::findOne($id_user);
       
            $group = \common\models\group\Group::find()
                    ->joinWith('tpkmSupervisiorAssignments')
                    ->where(['id_supervisior'=>$modelSupervisior->pegawai_id]);

            $providerSupervisor = new \yii\data\ActiveDataProvider([
                'query' => $group,
            ]);

            return $this->render('dashboard/index', [
                        'searchModel' => $searchModel,
                        'dataProvider' => $providerSupervisor,
                        'model'=>$modelSupervisior
            ]);            
        }
        else{            
            $modelStudents = Students::find()->where(['user_id'=>$id_user])->one();
            $id = Students::findOne(['user_id' => $id_user])->dim_id;
            $group = \common\models\group\Group::find()
                    ->joinWith('tpkmLeaderAssignments')->joinWith('tpkmMemberAssignments')
                    ->where(['tpkm_member_assignment.id_students' => $id])
                    ->orWhere(['tpkm_leader_assignment.id_students' => $id]);
            
            $p = new \yii\data\ActiveDataProvider([
                'query' => $group,
            ]);

            return $this->render('profile/index',[
                        'searchModel' => $searchModel,
                        'dataProvider' => $p,
                        'model'=>$modelStudents
            ]);
        } 
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset() {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for email provided.');
            }
        }

        return $this->render('requestPasswordResetToken', [
                    'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token) {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password was saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
                    'model' => $model,
        ]);
    }

    public function actionRegisterGroup() {
        $model = new GroupRegistration();
        if ($model->load(Yii::$app->request->post()) && $model->register()) {
            return $this->redirect(['site/dashboard']);
        }

        return $this->render('register_group', [
                    'model' => $model,
        ]);
    }
    
    public function actionRegisterStudents() {
        $model = new \common\models\Registerstudents();
        if ($model->load(Yii::$app->request->post()) && $model->register()) {
            return $this->redirect(['site/index']);
        }

        return $this->render('students_register', [
                    'model' => $model,
        ]);
    }
    
    public function actionDownload() {         
               
        $file = Yii::getAlias('@webroot'.'/upload/pedoman/Pedoman PKM Tahun 2015.pdf');
        
        if(file_exists($file)){
           return Yii::$app->response->sendFile($file);
        }
        else{
            throw new NotFoundHttpException('The file does not exist');
        }
    }

}
