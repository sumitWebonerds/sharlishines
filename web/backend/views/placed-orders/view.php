<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\PlacedOrders */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Placed Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="placed-orders-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'invoice',
            'product_id',
            'user_id',
            'quantity',
            'bill',
            'date',
            'updated_by',
            'created_by',
            'updated_at',
            'created_at',
            'is_deleted',
        ],
    ]) ?>

</div>
