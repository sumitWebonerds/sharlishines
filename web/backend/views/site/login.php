<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="login-page">
    <div class="login-main">  	
    	 <div class="login-head">
				<h1>Login</h1>
			</div>
			<div class="login-block">
				<?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
					<?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
					<?= $form->field($model, 'password')->passwordInput() ?>
					<div class="forgot-top-grids">
						<div class="forgot-grid">
							<?= $form->field($model, 'rememberMe')->checkbox() ?>
						</div>
						<div class="clearfix"> </div>
					</div>
                    <?= Html::submitButton('Login', ['class' => 'btn btn-primary btn-block', 'name' => 'login-button']) ?>		
				<?php ActiveForm::end(); ?>
				<h5><a href="index.html">Go Back to Home</a></h5>
			</div>
      </div>
</div>
