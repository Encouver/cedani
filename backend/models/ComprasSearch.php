<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Compras;

/**
 * ComprasSearch represents the model behind the search form about `app\models\Compras`.
 */
class ComprasSearch extends Compras
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'factura_id', 'producto_id', 'cantidad', 'fraccion', 'descuento'], 'integer'],
            [['precio_unitario'], 'number'],
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
    public function search($params, $facturas_id)
    {
        $query = Compras::find()->where('compras.factura_id = :xx', [':xx'=>$facturas_id]);


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
            'factura_id' => $this->factura_id,
            'producto_id' => $this->producto_id,
            'cantidad' => $this->cantidad,
            'fraccion' => $this->fraccion,
            'precio_unitario' => $this->precio_unitario,
            'descuento' => $this->descuento,
        ]);

        return $dataProvider;
    }
}
