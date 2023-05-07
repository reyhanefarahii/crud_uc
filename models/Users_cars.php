<?php
namespace app\models;
use yii\db\ActiveRecord;

class Users_cars extends ActiveRecord{

    public static function tableName()
    {
        return 'users_cars';
        // return ['users_id' => 'name','cars_id' => 'name'];
    }

    public function rules()
    {
        return[
            [['users_id', 'cars_id'], 'required']
        ];
    }
}