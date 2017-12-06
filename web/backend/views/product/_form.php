<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model common\models\Products */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="products-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php $data = ArrayHelper::map(\common\models\Categories::find()->asArray()->all(),'id','name');?>

    <?php echo $form->field($model, 'category_id')->dropDownList($data,['prompt'=>'Select Category']);?>    

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'image')->fileInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'package')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'benefits')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'suggested_use')->textarea(['rows' => 6]) ?>
    
    <?= $form->field($model, 'unit_price')->textInput() ?>

    <?= $form->field($model, 'is_deleted')->dropDownList(['0' => 'Deactive','1' => 'Active']); ?>
    
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
