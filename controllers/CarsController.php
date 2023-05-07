<?php

namespace app\controllers;
use Yii;
use yii\web\Controller;
use app\models\Cars;
use app\models\CarsSearch;
use yii\data\ActiveDataProvider ;
use yii\web\NotFoundHttpException;
/**
 * manual CRUD
 **/
class CarsController extends Controller
{  
    public function actionDataProvider(){
        $query = Cars::find();
        $provider = new ActiveDataProvider([
           'query' => $query,
        ]);
        // returns an array of cars objects
        $cars = $provider->getModels();
        var_dump($cars);
     }

    /**
     * Create
     */
    public function actionCreate()
    {
        $model = new Cars();
 
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
        $searchModel = new CarsSearch();
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
        $model = Cars::find()->where(['id' => $id])->one();
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
        $model =Cars::findOne($id);
        
       // $id not found in database
       if($model === null)
           throw new NotFoundHttpException('The requested page does not exist.');
            
       // delete record
       $model->delete();
        
       return $this->redirect(['list']);
    }
    

}
