<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
?>
 
<style>
table th,td{
    padding: 10px;
    border: 1px solid black;
}
</style>

<?= Html::a('Create', ['users/create'], ['class' => 'btn btn-success']); ?>
 
<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        'id',
        [
            'attribute' => 'name',
            'value' => function ($users) {
                return $users->name;
            },
            'label' => 'Name'
        ],
        'family',
        'national_code',
        [
            'class' => ActionColumn::className(), 'template' => '{delete} {update}',
            'urlCreator' => function ($action,$model, $key, $index, $column){
                return Url::toRoute([$action, 'id'=> $model->id]);
            }
        ],
    ],
]);?>



