<?php

namespace app\controllers;

use app\models\Product;
use yii\web\Controller;


class TestController extends Controller
{


    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionIndex()
    {
        $product = new Product();
        $product->id = 1;
        $product->price = 100;
        $product->title= 'yeti';
        $product->category = 'car';

        return $this->render('index',
            [
                'var'=> 'data','product' => $product
            ]);
        //return $this->render('about');
    }
}
