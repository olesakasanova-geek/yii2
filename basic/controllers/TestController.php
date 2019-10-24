<?php

namespace app\controllers;

use app\components\TestService;
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
        $product = new Product([
            'id' => 1, 'price' => 3500, 'title' => 'in-IZI', 'category' => 'dress'
        ]);

        //return Yii::$app->test->run();

        return $this->render('index',
            ['var' => 'data', 'product' => $product]
        );
    }
}


