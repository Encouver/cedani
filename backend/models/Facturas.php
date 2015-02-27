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
            [['cliente_id', 'numero_factura', 'numero_control', 'descuento_financiero'], 'integer'],
            [['fecha'], 'safe'],
            [['fecha'], 'date', 'format' => 'php: Y-m-d H:i:s'/*'php: Y-m-d H:i:s'*/, 'message' => 'Formato de fecha incorrecto.'],
            [['iva'], 'number'],
            [['status_pago', 'status_entrega', 'condiciones_pago'], 'string', 'max' => 255]
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
            'numero_factura' => 'Numero Factura',
            'numero_control' => 'Numero Control',
            'fecha' => 'Fecha',
            'status_pago' => 'Status Pago',
            'status_entrega' => 'Status Entrega',
            'condiciones_pago' => 'Condiciones Pago',
            'descuento_financiero' => 'Descuento Financiero',
            'iva' => 'Iva',
            'clienteNombre' => 'Razon Social',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCobranzas()
    {
        return $this->hasMany(Cobranzas::className(), ['factura_id' => 'id']);
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
