<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Inventarios;

/**
 * InventariosSearch represents the model behind the search form about `app\models\Inventarios`.
 */
class InventariosSearch extends Inventarios
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'producto_id', 'cantidad', 'proveedor_id'], 'integer'],
            [['fecha', 'observaciones'], 'safe'],
            [['precio_costo'], 'number'],
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
        $query = Inventarios::find() 
            ->where('cantidad != 0');
            
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'producto_id' => $this->producto_id,
            'cantidad' => $this->cantidad,
            'fecha' => $this->fecha,
            'proveedor_id' => $this->proveedor_id,
            'precio_costo' => $this->precio_costo,
        ]);

        $query->andFilterWhere(['like', 'observaciones', $this->observaciones]);

        return $dataProvider;
    }
}
