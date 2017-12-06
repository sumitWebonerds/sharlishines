<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\SecurityTokens */

$this->title = 'Create Security Tokens';
$this->params['breadcrumbs'][] = ['label' => 'Security Tokens', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="security-tokens-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
