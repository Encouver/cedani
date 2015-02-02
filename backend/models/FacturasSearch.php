<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Facturas;

/**
 * FacturasSearch represents the model behind the search form about `app\models\Facturas`.
 */
class FacturasSearch extends Facturas
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'clientes_id', 'numero_factura', 'numero_control', 'descuento_financiero'], 'integer'],
            [['fecha', 'status_pago', 'status_entrega', 'condiciones_pago'], 'safe'],
            [['iva'], 'number'],
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
        $query = Facturas::find();

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
            'clientes_id' => $this->clientes_id,
            'numero_factura' => $this->numero_factura,
            'numero_control' => $this->numero_control,
            'fecha' => $this->fecha,
            'descuento_financiero' => $this->descuento_financiero,
            'iva' => $this->iva,
        ]);

        $query->andFilterWhere(['like', 'status_pago', $this->status_pago])
            ->andFilterWhere(['like', 'status_entrega', $this->status_entrega])
            ->andFilterWhere(['like', 'condiciones_pago', $this->condiciones_pago]);

        return $dataProvider;
    }
}
