<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $address app\models\Address */
/* @var $customer app\models\Customer */

$this->title = 'Create Address';
$this->params['breadcrumbs'][] = ['label' => 'Customers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $customer->first_name.' '.$customer->last_name, 'url' => ['view', 'id' => $customer->id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="address-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'address' => $address,
    ]) ?>

</div>
