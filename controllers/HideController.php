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
            'pageSize' => 9,
            'pageSizeParam' => false,
            'forcePageParam' => false, 
        ]);
        $model = $query->offset($pages->offset)->limit($pages->limit)->all();
        
        return $this->render('elements', compact('model','pages'));
    }
    
    public function actionElement(){
        
        $id = \Yii::$app->request->get('id');
        $types = [
            'napoi' => 'Напиток',
            'snacks' => 'Снек',
            'prod_id' => 'ID',
            'prod_name' => 'Наименование',
            'prod_qty' => 'Кол-во',
            'prod_price' => 'Цена',
            'prod_type' => 'Тип',
        ];
        
        $model = Kava::findOne($id);
        if (empty($model))
            throw new \yii\web\HttpException(404, "Страницы c ID: ".$id." не существует!");
        //$model = Kava::find()->where(['id' => $id])->one();
        $model->products = unserialize($model->products);
        
        return $this->render('element', compact('model','types'));
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