<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Booking;

/**
 * BookingSearch represents the model behind the search form of `app\models\Booking`.
 */
class BookingSearch extends Booking
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['_id', 'guest_name', 'email', 'line', 'room_id', 'request', 'room_type', 'price', 'user_id', 'quantity', 'dateFrom', 'dateTo', 'cigarette_type', 'email', 'status'], 'safe'],
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
        $query = Booking::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere(['like', '_id', $this->_id])
            ->andFilterWhere(['like', 'guest_name', $this->guest_name])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'line', $this->line])
            ->andFilterWhere(['like', 'room_id', $this->room_id])
            ->andFilterWhere(['like', 'request', $this->request])
            ->andFilterWhere(['like', 'room_type', $this->room_type])
            ->andFilterWhere(['like', 'price', $this->price])
            ->andFilterWhere(['like', 'user_id', $this->user_id])
            ->andFilterWhere(['like', 'quantity', $this->quantity])
            ->andFilterWhere(['like', 'dateFrom', $this->dateFrom])
            ->andFilterWhere(['like', 'dateTo', $this->dateTo])
            ->andFilterWhere(['like', 'cigarette_type', $this->cigarette_type])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
