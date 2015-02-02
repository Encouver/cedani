<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ProductosProveedores;

/**
 * ProductosProveedoresSearch represents the model behind the search form about `app\models\ProductosProveedores`.
 */
class ProductosProveedoresSearch extends ProductosProveedores
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'proveedores_id'], 'integer'],
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
        $query = ProductosProveedores::find();

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
            'proveedores_id' => $this->proveedores_id,
        ]);

        return $dataProvider;
    }
}
