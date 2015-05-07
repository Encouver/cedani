<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Clientes;

/**
 * ClientesSearch represents the model behind the search form about `app\models\Clientes`.
 */
class ClientesSearch extends Clientes
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['nombre_razonsocial', 'domicilio_fiscal', 'rif', 'telefono1', 'telefono2', 'telefono3', 'correo', 'nombre_encargado', 'telefono_encargado', 'otro'], 'safe'],
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
        $query = Clientes::find();

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
        ]);

        $query->andFilterWhere(['like', 'nombre_razonsocial', $this->nombre_razonsocial])
            ->andFilterWhere(['like', 'domicilio_fiscal', $this->domicilio_fiscal])
            ->andFilterWhere(['like', 'rif', $this->rif])
            ->andFilterWhere(['like', 'telefono1', $this->telefono1])
            ->andFilterWhere(['like', 'telefono2', $this->telefono2])
            ->andFilterWhere(['like', 'telefono3', $this->telefono3])
            ->andFilterWhere(['like', 'correo', $this->correo])
            ->andFilterWhere(['like', 'nombre_encargado', $this->nombre_encargado])
            ->andFilterWhere(['like', 'telefono_encargado', $this->telefono_encargado])
            ->andFilterWhere(['like', 'otro', $this->otro]);

        return $dataProvider;
    }
}
