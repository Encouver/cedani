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
    public $formatoFull;

    public function rules()
    {
        return [
            [['id', 'formato', 'formato2'], 'integer'],
            [['nombre', 'descripcion', 'marca', 'excento_de_iva', 'formatoFull'], 'safe'],
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
            'nombre' => $this->nombre,
            'id' => $this->id,
            'kilo' => $this->kilo,
            'precio_venta' => $this->precio_venta,
            'precio_costo' => $this->precio_costo,
            'excento_de_iva' => $this->excento_de_iva,
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'descripcion', $this->descripcion])
            ->andFilterWhere(['like', 'marca', $this->marca]);
        $query->andWhere('concat_ws (" x ", formato, formato2) LIKE "%' . $this->formatoFull. '%"');

        $dataProvider->setSort([
        'attributes'=>[
            'formatoFull'=>[
                'asc'=>['formato'=>SORT_ASC, 'formato2'=>SORT_ASC],
                'desc'=>['formato'=>SORT_DESC, 'formato2'=>SORT_DESC],
                'label'=>'Formato',
                'default'=>SORT_ASC
            ],
        ]
        ]);
        return $dataProvider;


    }
}
