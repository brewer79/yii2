<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Customer */
/* @var $addressModel app\models\Address */

$this->title = $model->first_name.' '.$model->last_name;
$this->params['breadcrumbs'][] = ['label' => 'Customers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="customer-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'login',
            'password',
            'first_name',
            'last_name',
            'gender',
            ['attribute' => 'created_at', 'format' => ['date', 'dd-MM-Y HH:i']],
            'email',
        ],
    ]) ?>

    <p>
        <?= Html::a('Create new address', ['address/create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php $addresses = $model->address; ?>

    <div class="table-responsive">
        <table id="addresses"  class="table table-hover table-striped">
            <thead>
            <tr>
                <th>Postal code</th>
                <th>Country</th>
                <th>City</th>
                <th>Street</th>
                <th>Building</th>
                <th>Office/apartment</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($addresses as $address):?>
                <?php if(count($addresses) < 2):?>
                <tr>
                    <td><?= $address['postal_code']?></td>
                    <td><?= $address['country']?></td>
                    <td><?= $address['city']?></td>
                    <td><?= $address['street']?></td>
                    <td><?= $address['building']?></td>
                    <td><?= $address['apartment']?></td>
                    <td><?= Html::a('Update', ['address/update', 'id' => $address->id], ['class' => 'btn btn-primary']) ?></td>
                <?php else:?>
                    <td><?= $address['postal_code']?></td>
                    <td><?= $address['country']?></td>
                    <td><?= $address['city']?></td>
                    <td><?= $address['street']?></td>
                    <td><?= $address['building']?></td>
                    <td><?= $address['apartment']?></td>
                    <td><?= Html::a('Update', ['address/update', 'id' => $address->id], ['class' => 'btn btn-primary']) ?></td>
                    <td>        <?= Html::a('Delete', ['address/delete', 'id' => $address->id], [
                            'class' => 'btn btn-danger',
                            'data' => [
                                'confirm' => 'Are you sure you want to delete this item?',
                                'method' => 'post',
                            ],
                        ]) ?></td>
                <?php endif?>
                </tr>
            <?php endforeach?>
            </tbody>
        </table>
    </div>

    <div id="paging-first-datatable"></div>

</div>

<?php
$script = <<< JS
$('#addresses').datatable({
    pageSize: 5,
    pagingDivSelector: "#paging-first-datatable"
});

JS;
$this->registerJs($script);
?>
