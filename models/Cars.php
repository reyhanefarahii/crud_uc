<?php
namespace app\models;
use yii\db\ActiveRecord;

class Cars extends ActiveRecord{
    public static function tableName()
    {
        return 'cars';
    }

    public function rules()
    {
        return[
            [['name', 'color'], 'required']
        ];
    }
}