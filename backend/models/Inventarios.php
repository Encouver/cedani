<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "inventarios".
 *
 * @property integer $id
 * @property integer $producto_id
 * @property integer $cantidad
 * @property string $fecha
 * @property integer $proveedor_id
 * @property double $precio_costo
 * @property string $observaciones
 *
 * @property Productos $producto
 * @property Proveedores $proveedor
 * @property Proveedores $proveedor0
 */
class Inventarios extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'inventarios';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['producto_id', 'cantidad', 'fecha'], 'required'],
            [['producto_id', 'cantidad', 'proveedor_id'], 'integer'],
            [['fecha'], 'safe'],
            [['precio_costo'], 'number'],
            [['observaciones'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'producto_id' => 'Producto',
            'cantidad' => 'Cantidad',
            'fecha' => 'Fecha',
            'proveedor_id' => 'Proveedor',
            'precio_costo' => 'Precio de costo',
            'observaciones' => 'Observaciones',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducto()
    {
        return $this->hasOne(Productos::className(), ['id' => 'producto_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProveedor()
    {
        return $this->hasOne(Proveedores::className(), ['id' => 'proveedor_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProveedor0()
    {
        return $this->hasOne(Proveedores::className(), ['id' => 'proveedor_id']);
    }


}
