<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Users;
use yii\helpers\ArrayHelper;
?>
 
<?php $form = ActiveForm::begin(); ?>
 
    <?= $form->field($model, 'name') ?>
    <?= $form->field($model, 'family') ?>
    <?= $form->field($model, 'national_code') ?>

    <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']); ?>
 
<?php ActiveForm::end(); ?>
