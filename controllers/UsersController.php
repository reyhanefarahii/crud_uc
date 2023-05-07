<?php

namespace app\controllers;
use Yii;
use yii\web\Controller;
use app\models\Users;
use app\models\UsersSearch;
use yii\data\ActiveDataProvider ;
use yii\web\NotFoundHttpException;
/**
 * manual CRUD
 **/
class UsersController extends Controller
{  
    public function actionDataProvider(){
        $query = Users::find();
        $provider = new ActiveDataProvider([
           'query' => $query,
        ]);
        // returns an array of users objects
        $users = $provider->getModels();
        var_dump($users);
     }

    /**
     * Create
     */
    public function actionCreate()
    {
        $model = new Users();
 
        if ($model->load(Yii::$app->request->post())) {
            $model->save();
            return $this->redirect(['list']);
        } else {       
            return $this->render('create', ['model' => $model]);
        }
    }
    /**
     * Read
     */
    public function actionList()
    {    
        $searchModel = new UsersSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('list', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel
        ]);
    }
    /**
     * Update
     * @param integer $id
     */
    public function actionUpdate($id)
    {
        $model = Users::find()->where(['id' => $id])->one();
        // $id not found in database
        if($model === null)
            throw new NotFoundHttpException('The requested page does not exist.');
        // update record
        if($model->load(Yii::$app->request->post()) && $model->save()){
            return $this->redirect(['list']);
        }
        return $this->render('create', ['model' => $model]);
    }   
    /* Delete
    * @param integer $id
    */
    public function actionDelete($id)
    {
        $model =Users::findOne($id);
        
       // $id not found in database
       if($model === null)
           throw new NotFoundHttpException('The requested page does not exist.');
            
       // delete record
       $model->delete();
        
       return $this->redirect(['list']);
    }
    

}
