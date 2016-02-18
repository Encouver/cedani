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
             ['fraccion', 'default', 'value' => 0],
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
            'cantidad' => 'Unidad',
            'fraccion' => 'Fracción',
            'precio_unitario' => 'Precio Unitario',
            'descuento' => 'Dcto.%',
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

    public function getSubtotal()
    {
        $subtotal=0;


            if ($this->fraccion != '0') {
               $subtotal += (($this->precio_unitario/$this->producto->formato*$this->fraccion*$this->cantidad)-($this->precio_unitario/$this->producto->formato*$this->fraccion*$this->cantidad*$this->descuento/100));
           }else{
               $subtotal += ($this->precio_unitario*$this->cantidad-$this->precio_unitario*$this->cantidad*$this->descuento/100);
           }


        return $subtotal;
    



/*

        $sum = $command->queryScalar();

        return $sum;

*/
    }



    public function getIVA() //ARREGLARRRR
    {


        $porciento=$this->factura->iva;
$iva=0;
            if ($this->fraccion != '0') { 
               $iva += (((($this->precio_unitario/$this->producto->formato*$this->fraccion*$this->cantidad)-($this->precio_unitario/$this->producto->formato*$this->fraccion*$this->cantidad*$this->descuento/100)))*$porciento/100)*$this->producto->excento_de_iva;
                    //1 es no excento, 0 es excento (multiplicar por 0 da 0)

            }else{

               $iva = (($this->precio_unitario*$this->cantidad-$this->precio_unitario*$this->cantidad*$this->descuento/100)*$porciento/100)*$this->producto->excento_de_iva;

            }
        



        //CONTRIBUYENTE ESPECIAL (menos 25% del IVA)

        if ($this->factura->contribuyente == '1'){
            $iva = $iva - ($iva*0.25);
        }


        return $iva;



    }


}
