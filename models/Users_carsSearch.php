<?php

namespace app\models;

use yii\data\ActiveDataFilter;
use yii\data\ActiveDataProvider;

class Users_carsSearch extends Users_cars
{

    public function rules()
    {
        return [
            [['id','users_id', 'cars_id'], 'safe'],
         ];
    }




    public function search($params): ActiveDataProvider
    {
        $query = Users_cars::find();
        $this->load($params);
        $query->andFilterWhere(['users_cars.id' => $this->id]);
        $query->andFilterWhere(['like', 'users_cars.users_id', $this->users_id]);
        $query->andFilterWhere(['users_cars.cars_id' => $this->cars_id]);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10,
            ],
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC, 
                ]
            ],
        ]);

        return $dataProvider;
    }
}
