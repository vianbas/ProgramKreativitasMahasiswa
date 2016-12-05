<?php

namespace frontend\controllers;

class CategoryController extends \yii\web\Controller
{
    public function actionIndex()
    {        
        $searchModel = new \common\models\category\CategorySearch();
        $dataProvider = $searchModel->search(\Yii::$app->request->queryParams);
        
        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);        
    }
    
    public function actionCategory($id)
    {
        $searchModel = new \common\models\category\CategoryInformationSearch();
        $dataProvider = $searchModel->search(\Yii::$app->request->queryParams);
        
        $model = \common\models\category\CategoryInformation::find()->where(['id_category'=>$id]);
        $modelCategory = \common\models\category\Category::findOne($id);
        
        $models = new \yii\data\ActiveDataProvider([
            'query'=>$model,
        ]);
        
        return $this->render('view', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'model'=>$models,
                    'modelCategory' => $modelCategory,
        ]);        
    }    
    
}
