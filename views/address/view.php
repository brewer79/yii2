<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $customer app\models\Customer */
/* @var $model app\models\Address */

$this->title = 'Address id: '. $model->id;
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="customer-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'attribute' => 'customer_id',
                'value' => function($data){
                    return $data->customer->first_name.' '.$data->customer->last_name;
                },
            ],
            'postal_code',
            'country',
            'city',
            'street',
            'building',
            'apartment',
        ],
    ]) ?>

    <p>
        <?= Html::a('Create new address', ['address/create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Update', ['address/update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['address/delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

</div>
