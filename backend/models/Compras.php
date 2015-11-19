<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "compras".
 *
 * @property integer $id
 * @property integer $factura_id
 * @property integer $producto_id
 * @property integer $cantidad
 * @property integer $fraccion
 * @property string $precio_unitario
 * @property integer $descuento
 *
 * @property Facturas $facturas
 * @property Productos $productos
 * @property NotasDeCredito[] $notasDeCreditos
 */
class Compras extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'compras';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['factura_id', 'producto_id', 'cantidad'], 'required'],
            [['factura_id', 'producto_id', 'cantidad', 'fraccion', 'descuento'], 'integer'],
            [['precio_unitario'], 'number']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'factura_id' => 'Factura',
            'producto_id' => 'Producto',
            'cantidad' => 'Cantidad',
            'fraccion' => 'Fracción',
            'precio_unitario' => 'Precio Unitario',
            'descuento' => 'Descuento',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFactura()
    {
        return $this->hasOne(Facturas::className(), ['id' => 'factura_id']);
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
    public function getNotasDeCreditos()
    {
        return $this->hasMany(NotasDeCredito::className(), ['compra_id' => 'id']);
    }
}
