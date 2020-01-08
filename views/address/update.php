<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $customer app\models\Customer */
/* @var $address app\models\Address */

$this->title = 'Update Address: ' . $address->id;
$this->params['breadcrumbs'][] = ['label' => 'Customers', 'url' => ['customer/index']];
$this->params['breadcrumbs'][] = 'Customer ID №' . $address->customer_id;
$this->params['breadcrumbs'][] = 'Update address';
?>
<div class="customer-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'address' => $address,
    ]) ?>

</div>
