<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Addresses';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customer-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'customer_id',
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

            ['class' => 'yii\grid\ActionColumn',
                'template' => '{view}'
//                'template' => '{update} {delete}'
            ],
        ],
    ]); ?>

</div>
