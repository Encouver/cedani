<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\NotasDeCredito;

/**
 * NotasDeCreditoSearch represents the model behind the search form about `app\models\NotasDeCredito`.
 */
class NotasDeCreditoSearch extends NotasDeCredito
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'facturas_id', 'compras_id'], 'integer'],
            [['fecha'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = NotasDeCredito::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'facturas_id' => $this->facturas_id,
            'fecha' => $this->fecha,
            'compras_id' => $this->compras_id,
        ]);

        return $dataProvider;
    }
}
