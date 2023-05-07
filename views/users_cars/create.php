<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Users_cars;
use app\models\Users;
use app\models\Cars;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
?>

<?php $form = ActiveForm::begin(); ?>
 
  <?php
    echo $form->field($model, 'users_id')->widget(Select2::classname(), [
    'data' => $userDropDown,
    'options' => ['placeholder' => 'select the userName ...'],
    'pluginOptions' => [
    'allowClear' => true,
    ],
    ]);
    ?>
  <?php
    echo $form->field($model, 'cars_id')->widget(Select2::classname(), [
    'data' => $carDropDown,
    'options' => [
      'placeholder' => 'select the carName ...',
      'options' => [
        3 => ['disabled' => true]
      ]
    ],
    'pluginOptions' => [
    'allowClear' => true,
    ],
    ]);
    ?>
  
    <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']); ?>
<?php ActiveForm::end(); ?>
