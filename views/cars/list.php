<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\grid\ActionColumn;
use app\models\Orders;
use yii\helpers\Url;
?>
 
<style>
table th,td{
    padding: 10px;
    border: 1px solid black;
}
</style>

<?= Html::a('Create', ['cars/create'], ['class' => 'btn btn-success']); ?>
 
<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        'id',
        [
            'attribute' => 'name',
            'value' => function ($cars) {
                return $cars->name;
            },
            'label' => 'Name'
        ],
        'color',
        [
            'class' => ActionColumn::className(), 'template' => '{delete} {update}',
            'urlCreator' => function ($action,$model, $key, $index, $column){
                return Url::toRoute([$action, 'id'=> $model->id]);
            }
        ],
    ],
    
]);?>



