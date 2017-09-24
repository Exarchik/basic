<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\helpers\Html;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\Kava;

class HideController extends AppController
{
    
    public function actionElements(){
        
        $query = Kava::find()->select('id,surname,summary');
        $pages = new \yii\data\Pagination([
            'totalCount' => $query->count(),
            'pageSize' => 3,
            'pageSizeParam' => false,
            'forcePageParam' => false, 
        ]);
        $model = $query->offset($pages->offset)->limit($pages->limit)->all();
        
        return $this->render('elements', compact('model','pages'));
    }
    
    public function actionElement($id){
        
        $model = Kava::find()->where(['id' => $id])->one();
        $model->products = unserialize($model->products);
        
        return $this->render('element', compact('model'));
    }
    
    public function actionIndex($prof = null)
    {
        $text = "hello world!";
        $name = "Dmitriy";
        $surname = "Klenovyi";
        
        return $this->render('index', compact('text','name','surname','prof'));
    }
    
    public function actionTest()
    {
        $text = "Test!";
        
        return $this->render('test', [
            'text' => $text,
        ]);
    }
    
}