<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "compras".
 *
 * @property integer $id
 * @property integer $facturas_id
 * @property integer $productos_id
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
            [['facturas_id', 'productos_id', 'cantidad', 'precio_unitario'], 'required'],
            [['facturas_id', 'productos_id', 'cantidad', 'fraccion', 'descuento'], 'integer'],
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
            'facturas_id' => 'Facturas ID',
            'productos_id' => 'Productos ID',
            'cantidad' => 'Cantidad',
            'fraccion' => 'Fraccion',
            'precio_unitario' => 'Precio Unitario',
            'descuento' => 'Descuento',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFacturas()
    {
        return $this->hasOne(Facturas::className(), ['id' => 'facturas_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductos()
    {
        return $this->hasOne(Productos::className(), ['id' => 'productos_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNotasDeCreditos()
    {
        return $this->hasMany(NotasDeCredito::className(), ['compras_id' => 'id']);
    }
}
