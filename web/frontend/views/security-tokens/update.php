<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\SecurityTokens */

$this->title = 'Update Security Tokens: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Security Tokens', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="security-tokens-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
