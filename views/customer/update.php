<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $customer app\models\Customer */
/* @var $address app\models\Address */

$this->title = 'Update Customer: ' . $customer->first_name.' '.$customer->last_name;
$this->params['breadcrumbs'][] = ['label' => 'Customers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $customer->first_name.' '.$customer->last_name, 'url' => ['view', 'id' => $customer->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="customer-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'customer' => $customer,
        'address' => $address,
    ]) ?>

</div>
