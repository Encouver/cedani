<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Proveedores;

/**
 * ProveedoresSearch represents the model behind the search form about `app\models\Proveedores`.
 */
class ProveedoresSearch extends Proveedores
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['nombre', 'apellido', 'telefono1', 'telefono2', 'telefono3', 'direccion', 'correo', 'cuenta_bancaria1', 'banco_cuenta_bancaria1', 'datos_cuenta_bancaria1', 'cuenta_bancaria2', 'banco_cuenta_bancaria2', 'datos_cuenta_bancaria2', 'cuenta_bancaria3', 'banco_cuenta_bancaria3', 'datos_cuenta_bancaria3', 'notas'], 'safe'],
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
        $query = Proveedores::find();

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

        $query->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'apellido', $this->apellido])
            ->andFilterWhere(['like', 'telefono1', $this->telefono1])
            ->andFilterWhere(['like', 'telefono2', $this->telefono2])
            ->andFilterWhere(['like', 'telefono3', $this->telefono3])
            ->andFilterWhere(['like', 'direccion', $this->direccion])
            ->andFilterWhere(['like', 'correo', $this->correo])
            ->andFilterWhere(['like', 'cuenta_bancaria1', $this->cuenta_bancaria1])
            ->andFilterWhere(['like', 'banco_cuenta_bancaria1', $this->banco_cuenta_bancaria1])
            ->andFilterWhere(['like', 'datos_cuenta_bancaria1', $this->datos_cuenta_bancaria1])
            ->andFilterWhere(['like', 'cuenta_bancaria2', $this->cuenta_bancaria2])
            ->andFilterWhere(['like', 'banco_cuenta_bancaria2', $this->banco_cuenta_bancaria2])
            ->andFilterWhere(['like', 'datos_cuenta_bancaria2', $this->datos_cuenta_bancaria2])
            ->andFilterWhere(['like', 'cuenta_bancaria3', $this->cuenta_bancaria3])
            ->andFilterWhere(['like', 'banco_cuenta_bancaria3', $this->banco_cuenta_bancaria3])
            ->andFilterWhere(['like', 'datos_cuenta_bancaria3', $this->datos_cuenta_bancaria3])
            ->andFilterWhere(['like', 'notas', $this->notas]);

        return $dataProvider;
    }
}
