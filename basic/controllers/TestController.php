<?php

namespace app\controllers;

use app\models\Product;
use yii\base\BaseObject;
use yii\helpers\VarDumper;
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
        $data = [
            'id' => 2,
            'name' => 'Bunny',
            'price' => 2500,
            'category' => 'toy',

        ];
         $product->id = 1;
         $product->name = 'in-IZI';
         $product->price = '3500';
         $product->created_at = time();

         $product->setAttributes($data);


        //return VarDumper::dumpAsString($product->validate(), 4, true);
        $product->validate();
        return VarDumper::dumpAsString($product->getAttributes(), 4, true);


        return $this->render('index',
            [
                'data' => \Yii::$app->test->run(),
                'product' => $product]
        );
    }
}


