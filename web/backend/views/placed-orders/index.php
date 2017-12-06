<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\PlacedOrdersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Placed Orders';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="placed-orders-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Placed Orders', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'invoice',
            'product_id',
            'user_id',
            'quantity',
            // 'bill',
            // 'date',
            // 'updated_by',
            // 'created_by',
            // 'updated_at',
            // 'created_at',
            // 'is_deleted',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
