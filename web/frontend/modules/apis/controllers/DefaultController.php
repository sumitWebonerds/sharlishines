<?php

namespace frontend\modules\apis\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\rest\ActiveController;
use yii\web\Response;
use common\models\Categories;
use common\models\SecurityTokens;  
use yii\db\Expression;
/**
 * Default controller for the `apis` module
 */
class DefaultController extends ActiveController
{

        public $modelClass = "common\models\Categories";
       
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
        public function actionCategories(){
            $token = Yii::$app->request->get("token");
            $model = new Categories();
            
            if($this->auth($token)){
                 $categories =  $model->find()->where(['is_deleted' => 1])->asArray()->all();
                if(!empty($categories)){
                    return array('status' => 'success','data'=>$categories);
                }else{
                    return array('status' => 'failed','data' => "No data found !!! ");
                }

            }else{
               return array('status' => 'failure','message'=>'Unauthorized' ,'token'=>$token); 
            }
        }



}
