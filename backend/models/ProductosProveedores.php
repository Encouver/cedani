<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "productos_proveedores".
 *
 * @property integer $id
 * @property integer $proveedor_id
 * @property integer $producto_id
 *
 * @property Productos[] $productos
 * @property Productos $producto
 * @property Proveedores $proveedor
 */
class ProductosProveedores extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'productos_proveedores';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['proveedor_id', 'producto_id'], 'required'],
            [['proveedor_id', 'producto_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'proveedor_id' => 'Proveedor ID',
            'producto_id' => 'Producto ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductos()
    {
        return $this->hasMany(Productos::className(), ['producto_proveedor_id' => 'id', 'producto_proveedor_proveedor_id' => 'proveedor_id']);
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
}
