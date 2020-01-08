<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $customer app\models\Customer */
/* @var $address app\models\Address */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="customer-form">


        <?php $form = ActiveForm::begin(); ?>


        <?= $form->field($customer, 'login')->textInput(['maxlength' => true]) ?>

        <?= $form->field($customer, 'password')->passwordInput(['maxlength' => true]) ?>

        <?= $form->field($customer, 'first_name')->textInput(['maxlength' => true]) ?>

        <?= $form->field($customer, 'last_name')->textInput(['maxlength' => true]) ?>

        <?= $form->field($customer, 'gender')->dropDownList($customer->getGender(), ['prompt' => 'choose gender...']) ?>

        <?= $form->field($customer, 'email')->textInput(['maxlength' => true]) ?>

    <h3><?= Yii::t('app', 'Customer address') ?></h3>

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


