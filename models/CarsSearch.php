<?php

namespace app\models;

use yii\data\ActiveDataFilter;
use yii\data\ActiveDataProvider;

class CarsSearch extends Cars
{

    public function rules()
    {
        return [
            [['id', 'name', 'color'], 'safe'],
         ];
    }


    public function search($params): ActiveDataProvider
    {
        $query = Cars::find();
        $this->load($params);
        $query->andFilterWhere(['cars.id' => $this->id]);
        $query->andFilterWhere(['like', 'cars.name', $this->name]);
        $query->andFilterWhere(['cars.color' => $this->color]);
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
