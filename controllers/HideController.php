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
        
        $model = Kava::find()->select('id,surname,summary')->all();
        
        return $this->render('elements', compact('model'));
    }
    
    public function actionElement($id){
        
        $model = Kava::findOne('id = $d',$id);
        
        return $this->render('elements', compact('model'));
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