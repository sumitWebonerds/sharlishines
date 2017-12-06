<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ProductsSearch */
/* @var $form yii\widgets\ActiveForm */
?>
<style>
    .control-label{
        display:none;
    }
</style>
<div class="products-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>
    <div class="row">
        <div class="col-md-offset-8 col-md-4">
            <?= $form->field($model, 'name')->textInput(['placeholder' => "Enter Product name"]) ?>
                <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
                <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
        </div>
    </div>
 

    <?php ActiveForm::end(); ?>

</div>
