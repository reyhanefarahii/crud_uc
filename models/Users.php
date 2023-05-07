<?php
namespace app\models;
use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;

class Users extends ActiveRecord{
    public static function tableName()
    {
        return 'users';
    }

    public function rules()
    {
        return [
            [['name', 'family', 'national_code'], 'required'],
            [['national_code'] , 'string', 'max' => 10, 'min'=>10],
            [['national_code'] , 'unique']
            // [['national_code'], 'min' =>10 , 'max' => 10 ,'message' => 'Please Enter National Code 10 digits.'],
              
         ];
    }
}
