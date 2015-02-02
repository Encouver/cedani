<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Cobranzas;

/**
 * CobranzasSearch represents the model behind the search form about `app\models\Cobranzas`.
 */
class CobranzasSearch extends Cobranzas
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'facturas_id'], 'integer'],
            [['fecha', 'forma_pago', 'detalle_forma_pago', 'status_pago'], 'safe'],
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
        $query = Cobranzas::find();

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
        ]);

        $query->andFilterWhere(['like', 'forma_pago', $this->forma_pago])
            ->andFilterWhere(['like', 'detalle_forma_pago', $this->detalle_forma_pago])
            ->andFilterWhere(['like', 'status_pago', $this->status_pago]);

        return $dataProvider;
    }
}
