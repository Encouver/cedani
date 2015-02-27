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
    public $numero_control;
    public $nombre_razonsocial;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', ], 'integer'],
            [['fecha', 'forma_pago', 'detalle_forma_pago', 'status_pago', 'factura_id', 'numero_control', 'nombre_razonsocial'], 'safe'],
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

        $query->joinWith(['facturas','facturas.cliente']);
        //$query->joinWith('facturas.cliente');

        $query->andFilterWhere([
            'id' => $this->id,
            'fecha' => $this->fecha,
        ]);

        $query->andFilterWhere(['like', 'forma_pago', $this->forma_pago])
            ->andFilterWhere(['like', 'detalle_forma_pago', $this->detalle_forma_pago])
            ->andFilterWhere(['like', 'cobranzas.status_pago', $this->status_pago])
            ->andFilterWhere(['like', 'clientes.nombre_razonsocial', $this->nombre_razonsocial])
            ->andFilterWhere(['like', 'facturas.numero_control', $this->numero_control]);

     $dataProvider->setSort([
        'attributes'=>[
            'fecha',
            'numero_control'=>[
                'asc'=>['facturas.numero_control'=>SORT_ASC],
                'desc'=>['facturas.numero_control'=>SORT_DESC]
            ],

            'forma_pago',
            'detalle_forma_pago',
            'status_pago',            
            'nombre_razonsocial'=>[
                'asc'=>['clientes.nombre_razonsocial'=>SORT_ASC],
                'desc'=>['clientes.nombre_razonsocial'=>SORT_DESC]
            ]
        ]
    ]);

        return $dataProvider;
    }
}
