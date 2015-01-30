<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "facturas".
 *
 * @property integer $id
 * @property integer $clientes_id
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
            [['clientes_id', 'numero_factura', 'numero_control', 'iva'], 'required'],
            [['clientes_id', 'numero_factura', 'numero_control', 'descuento_financiero'], 'integer'],
            [['fecha'], 'safe'],
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
            'clientes_id' => 'Clientes ID',
            'numero_factura' => 'Numero Factura',
            'numero_control' => 'Numero Control',
            'fecha' => 'Fecha',
            'status_pago' => 'Status Pago',
            'status_entrega' => 'Status Entrega',
            'condiciones_pago' => 'Condiciones Pago',
            'descuento_financiero' => 'Descuento Financiero',
            'iva' => 'Iva',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCobranzas()
    {
        return $this->hasMany(Cobranzas::className(), ['facturas_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompras()
    {
        return $this->hasMany(Compras::className(), ['facturas_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEntregas()
    {
        return $this->hasMany(Entregas::className(), ['facturas_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClientes()
    {
        return $this->hasOne(Clientes::className(), ['id' => 'clientes_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNotasDeCreditos()
    {
        return $this->hasMany(NotasDeCredito::className(), ['facturas_id' => 'id']);
    }
}
