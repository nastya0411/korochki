<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "name".
 *
 * @property int $id
 * @property string $title
 *
 * @property Order[] $orders
 */
class Name extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'name';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['title'], 'string', 'max' => 255],
            [['title'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
        ];
    }

    /**
     * Gets query for [[Orders]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Order::class, ['name_id' => 'id']);
    }

    public static function getNames()
    {
        return self::find()
            ->select('title')
            ->indexBy('id')
            ->column();
    }
}
