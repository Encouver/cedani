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
            [['nombre', 'marca', 'formato', 'formato2', 'kilo', 'precio_venta', 'precio_costo', 'excento_de_iva'], 'required'],
            [['formato', 'kilo', 'excento_de_iva'], 'integer'],
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
        return $this->formato.' x '.floatval($this->formato2);

    } 
}
