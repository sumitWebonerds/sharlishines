<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Categories */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="categories-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'image')->fileInput(['maxlength' => true]) ?>
    <?php 
        if(!empty($_GET['id'])){
?> 
    <?php
        if(!empty($model->image)){
    ?>
                <img src="../images/<?= $model->image ?>" class="thumbnail img-reponsive"> 
    <?php        
        }else{
    ?>
        <i class="text-danger" >No Image</i>
    <?php        
        } 
    ?> 

    <?php
        }
    ?>
    <?= $form->field($model, 'is_deleted')->dropDownList(['1' => 'Active', '0' => 'Deactive']); ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
