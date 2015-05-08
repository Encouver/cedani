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

    public $nombre;
    public $marca;
    public $formatoFull;
    public $formato;
    public $formato2;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'producto_id', 'cantidad', 'proveedor_id'], 'integer'],
            [['fecha', 'observaciones','marca','nombre', 'formatoFull'], 'safe'],
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
        $query->joinWith(['productos']);

        $query->andFilterWhere([
            'id' => $this->id,
            'producto_id' => $this->producto_id,
            'cantidad' => $this->cantidad,
            'proveedor_id' => $this->proveedor_id,
            'precio_costo' => $this->precio_costo,
        ])
            ->andFilterWhere(['like', 'productos.nombre', $this->nombre])
            ->andFilterWhere(['like', 'productos.marca', $this->marca])
            ->andFilterWhere(['like', 'productos.formato', $this->formato])
            ->andFilterWhere(['like', 'productos.formato2', $this->formato2])
            ->andFilterWhere(['like', 'observaciones', $this->observaciones]);
        $query->andWhere('concat_ws (" x ", productos.formato, productos.formato2) LIKE "%' . $this->formatoFull. '%"')
            ->andWhere('date(fecha) LIKE "%'.$this->fecha.'%"');

     $dataProvider->setSort([
        'attributes'=>[
            'cantidad',
            'fecha',
            'nombre'=>[
                'asc'=>['productos.nombre'=>SORT_ASC],
                'desc'=>['productos.nombre'=>SORT_DESC]
            ],
            'marca'=>[
                'asc'=>['productos.marca'=>SORT_ASC],
                'desc'=>['productos.marca'=>SORT_DESC]
            ],
            'formatoFull'=>[
                'asc'=>['productos.formato'=>SORT_ASC, 'productos.formato2'=>SORT_ASC],
                'desc'=>['productos.formato'=>SORT_DESC, 'productos.formato2'=>SORT_DESC],
                'label'=>'Formato',
                'default'=>SORT_ASC
            ],
        ]
    ]);


        return $dataProvider;
    }
}
