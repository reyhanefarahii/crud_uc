<?php

namespace app\controllers;
use Yii;
use yii\web\Controller;
use app\models\Users_cars;
use app\models\Cars;
use app\models\Users;
use app\models\Users_carsSearch;
use yii\data\ActiveDataProvider ;
use yii\web\NotFoundHttpException;
use conquer\select2\Select2Action;
use app\components\Action1;
/**
 * manual CRUD
 **/
class Users_carsController extends Controller
{   
    public function actionDataProvider(){
        $query = Users_cars::find();
        $provider = new ActiveDataProvider([
           'query' => $query,
        ]);
        // returns an array of users_cars objects
        $users_cars = $provider->getModels();
        var_dump($users_cars);
     }

    /**
     * Create
     */
    public function actionCreate()
    {
        
        $model = new Users_cars();

        $userDropDown=[];
        $users = Users::find()->all();
        foreach ($users as $user) {
            $userDropDown[$user->id] = $user->name;
            // var_dump($userDropDown);
        }
        $carDropDown=[];
        $cars = Cars::find()->all();
        foreach ($cars as $car) {
            $carDropDown[$car->id] = $car->name;
            // var_dump($carDropDown);
        }  
        if(isset($_POST['user_id']) and isset($_POST['cars_id'])){
        if ($model->load(Yii::$app->request->post())) {
            $model->save();
            return $this->redirect(['list']);
        }} else {       
            return $this->render('create', ['model' => $model,'userDropDown'=>$userDropDown,'carDropDown'=>$carDropDown]);
        }
    }

    
    /**
     * Read
     */
    public function actionList()
    {    
        $searchModel = new Users_carsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('list', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel
        ]);
    }

    public function actions()
    {
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
     * Update
     * @param integer $id
     */
    public function actionUpdate($id)
    {
        $model = Users_cars::find()->where(['id' => $id])->one();
        
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
        $model =Users_cars::findOne($id);
        
       // $id not found in database
       if($model === null)
           throw new NotFoundHttpException('The requested page does not exist.');
            
       // delete record
       $model->delete();
        
       return $this->redirect(['list']);
    }




}
