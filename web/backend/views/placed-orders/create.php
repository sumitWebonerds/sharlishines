<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\PlacedOrders */

$this->title = 'Create Placed Orders';
$this->params['breadcrumbs'][] = ['label' => 'Placed Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="placed-orders-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
