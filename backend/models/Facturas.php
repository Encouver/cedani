<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "facturas".
 *
 * @property integer $id
 * @property integer $cliente_id
 * @property integer $numero_factura
 * @property integer $numero_control
 * @property string $fecha
 * @property string $status_pago
 * @property string $status_entrega
 * @property string $condiciones_pago
 * @property integer $descuento_financiero
 * @property string $iva
 *
 * @property Cobranzas[] $cobranzas
 * @property Compras[] $compras
 * @property Entregas[] $entregas
 * @property Clientes $clientes
 * @property NotasDeCredito[] $notasDeCreditos
 */
class Facturas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'facturas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cliente_id', 'numero_factura', 'numero_control', 'iva'], 'required'],
            [['cliente_id', 'numero_factura', 'numero_control', 'descuento_financiero','cerrada'], 'integer'],
            [['fecha'], 'safe'],
            [['fecha'], 'date', 'format' => 'php: Y-m-d H:i:s'/*'php: Y-m-d H:i:s'*/, 'message' => 'Formato de fecha incorrecto.'],
            [['iva'], 'number'],
            [['condiciones_pago'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cliente_id' => 'Cliente',
            'numero_factura' => 'Número de Factura',
            'numero_control' => 'Número de Control',
            'fecha' => 'Fecha',
            'status_pago' => 'Status Pago',
            'status_entrega' => 'Status Entrega',
            'condiciones_pago' => 'Condiciones Pago',
            'descuento_financiero' => 'Descuento Financiero',
            'iva' => 'IVA',
            'clienteNombre' => 'Razón Social',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCobranzas()
    {
        return $this->hasMany(Cobranzas::className(), ['factura_id' => 'id']);
    }

    public function getSubtotal()
    {
        $command = Yii::$app->db->createCommand("SELECT sum(precio_unitario*cantidad-precio_unitario*(cantidad*descuento/100)) FROM compras WHERE factura_id = :x")
                   ->bindValue(':x', $this->id);

        $sum = $command->queryScalar();
        return $sum;
    }



    public function getIVA()
    {

        $porciento=$this->iva;
        $command = Yii::$app->db->createCommand("SELECT c.precio_unitario*c.cantidad as monto, p.excento_de_iva, c.descuento FROM compras c join productos p on c.producto_id = p.id WHERE factura_id = :x")
                   ->bindValue(':x', $this->id);
        $results = $command->queryAll();
        $iva = 0;
        foreach ($results as $result) {
            if ($result['excento_de_iva'] == '0') {
               $iva += ($result['monto']-($result['monto']*$result['descuento']/100))*$porciento/100;        
            }
        }
        return $iva;
    }
    


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompras()
    {
        return $this->hasMany(Compras::className(), ['factura_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEntregas()
    {
        return $this->hasMany(Entregas::className(), ['factura_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCliente()
    {
        return $this->hasOne(Clientes::className(), ['id' => 'cliente_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClienteNombre()
    {
        return $this->cliente->nombre_razonsocial;
    }

    public function getFacturasNumeroFacturasNumeroControl()
    {
        return $this->numero_factura.' - '.$this->numero_control.' - '.$this->clienteNombre;

    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNotasDeCreditos()
    {
        return $this->hasMany(NotasDeCredito::className(), ['factura_id' => 'id']);
    }
}
