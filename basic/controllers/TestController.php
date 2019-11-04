<?php

namespace app\controllers;

use app\components\TestService;
use app\models\Product;
use yii\db\Query;
use yii\helpers\VarDumper;
use yii\web\Controller;

class TestController extends Controller
{

    public function actionIndex()
    {
        $users1 = User::find()->joinWith(User::RELATION_TASKS_CREATOR_ID)->asArray()->all();
        $title = "Kasianova";
        return $this->render('index', [
            'title' => $title,
            'users' => $users1,
        ]);
    }

    public function actionInsert()
    {

        \Yii::$app->db->createCommand()->insert('user',
            [
                'username' => 'Ilyin',
                'password_hash' => '4d43075f14',
                'auth_key' => 'key_1',
                'creator_id' => 1,
                'updater_id' => 2,
                'created_at' => 1555143750,
                'updated_at' => 1555143750,
            ])->execute();

        \Yii::$app->db->createCommand()->insert('user',
            [
                'username' => 'Vasiliev',
                'password_hash' => 'f4e5da32dd',
                'auth_key' => 'key_2',
                'creator_id' => 2,
                'updater_id' => 3,
                'created_at' => 1555143750,
                'updated_at' => 1555143750,
            ])->execute();


        \Yii::$app->db->createCommand()->insert('user',
            [
                'username' => 'Smirnov',
                'password_hash' => 'ed585d7a21',
                'auth_key' => 'key_3',
                'creator_id' => 3,
                'updater_id' => 1,
                'created_at' => 1555143750,
                'updated_at' => 1555143750,
            ])->execute();

        \Yii::$app->db->createCommand()->insert('user',
            [
                'username' => 'Kasyanov',
                'password_hash' => '0cf555b2b6',
                'auth_key' => 'key_4',
                'creator_id' => 4,
                'updater_id' => 3,
                'created_at' => 1555143750,
                'updated_at' => 1555143750,
            ])->execute();

        \Yii::$app->db->createCommand()->batchInsert('task',
            [
                'title',
                'description',
                'creator_id',
                'updater_id',
                'created_at',
                'updated_at'
            ],


            [
                ['task1', 'first task', 1, 2, 1555143750, 1555143750],
                ['task2', 'second task', 2, 3, 1555143750, 1555143750],
                ['task3', 'third task', 3, 1, 1555143750, 1555143750],
                ['task4', 'fourth task', 4, 3, 1555143750, 1555143750],

            ])->execute();
    }

    public function actionSelect()
    {
        $data = (new Query())->from('user')
            ->where(['id' => 1])
            ->all();
        $data1 = (new Query())->from('user')
            ->where(['>', 'id', '1'])
            ->orderBy(['username' => SORT_DESC])
            ->all();
        $data2 = (new Query())->from('user')->count('');
        $data3 = (new Query())->from('task')
            ->innerJoin('user', 'user.id = task.creator_id')
            ->all();
    }
}