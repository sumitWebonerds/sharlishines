<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\CategoriesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Categories';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="categories-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Categories', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'name',

             [
                'attribute' => 'image',
                'format' => 'html',
                'label' => 'Logo',
                'value' => function ($data) {
                    return Html::img('../images/'.$data['image'],
                        ['width' => '75px']);
                },
            ],
            [
            'attribute'=>'active',
            'header'=>'Status',
            'filter' => ['1'=>'Active', '0'=>'Deactive'],
            'format'=>'raw',    
            'value' => function($model, $key, $index)
            {   
                if($model->is_deleted == '1')
                {
                    return '<p class="label label-success">Active</p>';
                }
                else
                {   
                    return '<p class="label label-danger">Inactive</p>';
                }
            },
        ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
