<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $address app\models\Address */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="address-form">


        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($address, 'customer_id')->textInput(['maxlength' => true]) ?>

        <?= $form->field($address, 'postal_code')->textInput(['maxlength' => true]) ?>

        <?= $form->field($address, 'country')->textInput(['maxlength' => true]) ?>

        <?= $form->field($address, 'city')->textInput(['maxlength' => true]) ?>

        <?= $form->field($address, 'street')->textInput(['maxlength' => true]) ?>

        <?= $form->field($address, 'building')->textInput(['maxlength' => true]) ?>

        <?= $form->field($address, 'apartment')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>


</div>


