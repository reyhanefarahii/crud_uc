<?php

namespace app\models;

use yii\data\ActiveDataFilter;
use yii\data\ActiveDataProvider;

class UsersSearch extends Users
{

    public function rules()
    {
        return [
            [['id', 'name', 'family', 'national_code'], 'safe'],
         ];
    }


    public function search($params): ActiveDataProvider
    {
        $query = Users::find();
        $this->load($params);
        $query->andFilterWhere(['users.id' => $this->id]);
        $query->andFilterWhere(['like', 'users.name', $this->name]);
        $query->andFilterWhere(['users.family' => $this->family]);
        $query->andFilterWhere(['users.national_code' => $this->national_code]);
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
