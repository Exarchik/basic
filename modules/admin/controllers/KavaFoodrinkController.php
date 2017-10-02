<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\KavaFoodrink;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\UploadedFile;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * KavaFoodrinkController implements the CRUD actions for KavaFoodrink model.
 */
class KavaFoodrinkController extends Controller
{
    /**
     * @inheritdoc
     */
    public function __construct($id, $module, $config = [])
    {
        $this->layout = 'main.php';
        parent::__construct($id, $module, $config);
    }
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all KavaFoodrink models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => KavaFoodrink::find(),
            'pagination' => [
                'pageSize' => 10,
                'forcePageParam' => false,
                'pageSizeParam' => false,
            ],
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single KavaFoodrink model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new KavaFoodrink model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new KavaFoodrink();
        
        if (Yii::$app->request->isPost){
            $_tmpPost = Yii::$app->request->post();
            
            if ($tmpFilePath = $model->loadFoodImg('imgFile')){
                $_tmpPost['KavaFoodrink']['img'] = $tmpFilePath;
            }
            $_tmpPost['KavaFoodrink']['price'] = $_tmpPost['KavaFoodrink']['priceHrn'] 
                    + $_tmpPost['KavaFoodrink']['priceCoin'] / 100;
            
            if ($model->load($_tmpPost) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
            return $this->render('create', [
                'model' => $model,
            ]);
        }else{

            return $this->render('create', [
                'model' => $model,
            ]);
        }
        
    }

    /**
     * Updates an existing KavaFoodrink model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model->priceHrn = floor($model->price);
        $model->priceCoin = round(($model->price - $model->priceHrn)*100);
        
        if (Yii::$app->request->isPost){
            $_tmpPost = Yii::$app->request->post();
            
            if ($tmpFilePath = $model->loadFoodImg('imgFile')){
                $_tmpPost['KavaFoodrink']['img'] = $tmpFilePath;
            }
            $model->price = $_tmpPost['KavaFoodrink']['priceHrn'] 
                    + $_tmpPost['KavaFoodrink']['priceCoin'] / 100;

            if ($model->load($_tmpPost) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
            return $this->render('update', [
                'model' => $model,
            ]);
        }else{

            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing KavaFoodrink model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the KavaFoodrink model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return KavaFoodrink the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = KavaFoodrink::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
