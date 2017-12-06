<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ProductsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="products-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Products', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
       
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
             'category_id',
            // [
            //      'attribute'=>'category_id', 
            //      'label'=>'Category', 
            //      'value'=>function ($model,$key, $index){ return $model->categories->name; }
            // ],
            'name',
            [
                'attribute' => 'image',
                'format' => 'html',
                'label' => 'Images',
                'value' => function ($data) {
                    return Html::img('../images/'.$data['image'],
                        ['width' => '75px']);
                },
            ],
            'package',
            // 'description:ntext',
            // 'benefits:ntext',
            // 'suggested_use:ntext',
            // 'updated_by',
            // 'created_by',
            // 'updated_at',
            // 'created_at',
            [
            'attribute'=>'active',
            'header'=>'Status',
            'filter' => ['1'=>'Active', '0'=>'Deactive'],
            'format'=>'raw',    
            'value' => function($model, $key, $index)
            {   
                if($model->is_deleted == '1')
                {
                    return '<p style="padding: 6px 12px; color: #fff; background-color: #449d44; border-color: #255625; text-align: center; border-radius: 4px;">Active</p>';
                }
                else
                {   
                    return '<p style="padding: 6px 12px; color: #fff; background-color: #c9302c; border-color: #761c19; text-align: center; border-radius: 4px;">Inactive</p>';
                }
            },
        ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
