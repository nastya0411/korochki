<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Order;

/**
 * OrderSerach represents the model behind the search form of `app\models\Order`.
 */
class OrderSerach extends Order
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'name_id', 'status_id', 'pay_type_id'], 'integer'],
            [['appointment_date', 'appointment_time', 'created_at'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Order::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            "pagination" => [
                "pageSize" => 4,
            ]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'user_id' => $this->user_id,
            'name_id' => $this->name_id,
            'status_id' => $this->status_id,
            'appointment_date' => $this->appointment_date,
            'appointment_time' => $this->appointment_time,
            'created_at' => $this->created_at,
            'pay_type_id' => $this->pay_type_id,
        ]);

        return $dataProvider;
    }
}
