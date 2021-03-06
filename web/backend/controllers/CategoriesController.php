<?php

namespace backend\controllers;

use Yii;
use common\models\Categories;
use common\models\CategoriesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\filters\AccessControl;

/**
 * CategoriesController implements the CRUD actions for Categories model.
 */
class CategoriesController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index','create','view','update','delete','logout'],
                'rules' => [
                    [
                        'actions' => ['index','create','view','update','delete','logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Categories models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CategoriesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Categories model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Categories model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Categories();        
       
        if ($model->load(Yii::$app->request->post())) {
            $imageName = "cat_image_".rand();
            $model->file = UploadedFile::getInstance($model,'image');
        
            if(!empty($model->file)){      
                $model->file->saveAs('../images/categories/'.$imageName.'.'.$model->file->extension);
                $model->image = 'categories/'.$imageName.'.'.$model->file->extension;
            }
            if($model->save()){
                return $this->redirect(['view', 'id' => $model->id]);
            }else{  
                return $this->render('create', [
                    'model' => $model,
                ]);
            }

        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Categories model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $oldimage = $model->image;

        if ($model->load(Yii::$app->request->post())) {
            
            $imageName = "cat_image_".rand();                       
            $model->file = UploadedFile::getInstance($model,'image');
            
            if(!empty($model->file)){
                
                $model->file->saveAs('../images/categories/'.$imageName.'.'.$model->file->extension);
                $model->image = 'categories/'.$imageName.'.'.$model->file->extension;
                if($model->save(false)){
                    return $this->redirect(['view', 'id' => $model->id]);
                }else{
                    return $this->render('update', [
                        'model' => $model,
                    ]);                        
                }    
            }else{
                $model->image = $oldimage;
                $model->save(false);
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Categories model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Categories model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Categories the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Categories::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
