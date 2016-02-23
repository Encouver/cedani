<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "productos".
 *
 * @property integer $id
 * @property string $nombre
 * @property string $descripcion
 * @property string $marca
 * @property integer $formato
 * @property integer $formato2
 * @property integer $kilo
 * @property string $precio_venta
 * @property string $precio_costo
 * @property integer $excento_de_iva
 *
 * @property Compras[] $compras
 * @property HistoricoPrecios[] $historicoPrecios
 * @property Inventarios[] $inventarios
 * @property ProductosProveedores[] $productosProveedores
 */
class Productos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'productos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre', 'marca', 'formato', 'formato2', 'kilo', 'precio_venta', 'excento_de_iva','tipo_formato'], 'required'],
            [['formato', 'kilo', 'excento_de_iva', 'tipo_formato'], 'integer'],
            [['precio_venta', 'precio_costo', 'formato2'], 'number'],
            [['nombre', 'descripcion', 'marca'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'descripcion' => 'Descripcion',
            'marca' => 'Marca',
            'formato' => 'Formato',
            'formato2' => '',
            'kilo' => 'Kilo',
            'precio_venta' => 'Precio Venta',
            'precio_costo' => 'Precio Costo',
            'excento_de_iva' => 'Excento de IVA',
            'tipo_formato'=> '',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompras()
    {
        return $this->hasMany(Compras::className(), ['producto_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHistoricoPrecios()
    {
        return $this->hasMany(HistoricoPrecios::className(), ['producto_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInventarios()
    {
        return $this->hasMany(Inventarios::className(), ['producto_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductosProveedores()
    {
        return $this->hasMany(ProductosProveedores::className(), ['producto_id' => 'id']);
    }

    public function getProductosFormato()
    {
        return $this->nombre.' - '.$this->formato.' x '.floatval($this->formato2);

    }    
    public function getFormatoFull()
    {
        if ($this->tipo_formato = '0'){
            return $this->formato.' x '.floatval($this->formato2).' gr.';
        }else{
            return $this->formato.' x '.floatval($this->formato2).' Kg.';
        }
    } 

public function getExcentoLabel()
{
    return $this->excento_de_iva ? 'No' : 'Sí';
}

}

