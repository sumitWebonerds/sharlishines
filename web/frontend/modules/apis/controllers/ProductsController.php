<?php

namespace frontend\modules\apis\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\rest\ActiveController;
use yii\web\Response;
use common\models\Products;
use common\models\Categories;
use common\models\Sliders;
use common\models\SecurityTokens;  
use common\models\LoginForm;
use yii\db\Expression;
/**
 * Products controller for the `apis` module
 */
class ProductsController extends ActiveController
{

        public $modelClass = "common\models\Products";
       
        public function behaviors()
        {
            $behaviors = parent::behaviors();
            $behaviors['contentNegotiator']['formats']['text/html'] = Response::FORMAT_JSON;
            
            // remove authentication filter
            $auth = $behaviors['authenticator'];
            unset($behaviors['authenticator']);
            // add CORS filter
            $behaviors['corsFilter'] = [
                'class' => \yii\filters\Cors::className(),
            ];
            // re-add authentication filter
            $behaviors['authenticator'] = $auth;
            // avoid authentication on CORS-pre-flight requests (HTTP OPTIONS method)
            $behaviors['authenticator']['except'] = ['options'];
            return $behaviors;
        }

        public function auth($token)
        {
            $model = new SecurityTokens(); 
            if(!empty($token)){
                if($model->find()->where(['token' => md5($token),'status' => 0])->asArray()->one()){                            
                    return true;
                }else{
                    return false;
                }
            }else{
                 return false;
            }
        }
        
		public function actionCategoriesList(){

            $model = new Categories();

             $categories =  $model->find()->where(['is_deleted' => 1])->asArray()->all();
            if(!empty($categories)){
                return array('status' => 'success','data'=>$categories);
            }else{
                return array('status' => 'failed','message' => "No data found !!! ");
            }

        }

        public function actionProductList(){
            $id = Yii::$app->request->get("product_id");
            $model = new Products();            
                 $products =  $model->find()->where(['is_deleted' => 1,'category_id'=> $id])->asArray()->all();
                if(!empty($products)){
                    return array('status' => 'success','data'=>$products);
                }else{
                    return array('status' => 'failed','message' => "No data found !!! ");
                }

        }

        public function actionSliderList(){

            $model = new Sliders();            
            $sliders =  $model->find()->where(['is_deleted' => 1])->asArray()->all();
            if(!empty($sliders)){
                return array('status' => 'success','data'=>$sliders);
            }else{
                return array('status' => 'failed','message' => "No data found !!! ");
            }

        }

}
