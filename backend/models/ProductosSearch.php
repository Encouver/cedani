<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Productos;

/**
 * ProductosSearch represents the model behind the search form about `app\models\Productos`.
 */
class ProductosSearch extends Productos
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'formato', 'formato2', 'kilo', 'excento_de_iva', 'productos_proveedores_id', 'productos_proveedores_proveedores_id'], 'integer'],
            [['nombre', 'descripcion', 'marca'], 'safe'],
            [['precio_venta', 'precio_costo'], 'number'],
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
        $query = Productos::find();

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
            'formato' => $this->formato,
            'formato2' => $this->formato2,
            'kilo' => $this->kilo,
            'precio_venta' => $this->precio_venta,
            'precio_costo' => $this->precio_costo,
            'excento_de_iva' => $this->excento_de_iva,
            'productos_proveedores_id' => $this->productos_proveedores_id,
            'productos_proveedores_proveedores_id' => $this->productos_proveedores_proveedores_id,
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'descripcion', $this->descripcion])
            ->andFilterWhere(['like', 'marca', $this->marca]);

        return $dataProvider;
    }
}
