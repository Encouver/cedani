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
    public $marca;
    public $formato;
    public $producto;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'cantidad'], 'integer'],
            [['producto_id', 'marca', 'formato', 'producto'], 'string'],
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
        $query = Inventarios::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->joinWith('producto');

        $query->andFilterWhere([
            'id' => $this->id,
            //'producto_id' => $this->producto_id,
            'cantidad' => $this->cantidad,

        ]);

        $query->andFilterWhere(['like', 'productos.nombre', $this->producto])
        ->andFilterWhere(['like', 'productos.marca', $this->marca]);


    $dataProvider->setSort([
        'attributes'=>[
            'producto'=>[
                'asc'=>['productos.nombre'=>SORT_ASC],
                'desc'=>['productos.nombre'=>SORT_DESC]
            ],
            'cantidad',
            'marca'=>[
                'asc'=>['productos.marca'=>SORT_ASC],
                'desc'=>['productos.marca'=>SORT_DESC]
            ],
    ]
    ]);



        return $dataProvider;
    }
}
