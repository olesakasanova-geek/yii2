<?php

namespace app\models;

use Yii;
use yii\validators\RequiredValidator;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property string $name
 * @property string $price
 * @property int $created_at
 */
class Product extends \yii\db\ActiveRecord
{
    const SCENARIO_UPDATE = 'update';
    const SCENARIO_CREATE = 'create';
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    public function scenarios()
    {
        return [
          self::SCENARIO_DEFAULT => ['name', 'price', 'id'],

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'price', 'created_at'], RequiredValidator::class],
            [['created_at'], 'integer'],
            //[['id'], 'safe'],
            [['name', 'price'], 'string', 'max' => 50],

            [['name'], 'filter', 'filter' => function($value){
            return trim($value);
            }],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'price' => 'Price',
            'created_at' => 'Created At',
        ];
    }
}
