<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cobranzas".
 *
 * @property integer $id
 * @property integer $factura_id
 * @property string $fecha
 * @property string $forma_pago
 * @property string $detalle_forma_pago
 * @property string $status_pago
 *
 * @property Facturas $factura
 */
class Cobranzas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cobranzas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['factura_id', 'fecha', 'status_pago'], 'required'],
            [['factura_id'], 'integer'],
            [['fecha'], 'safe'],
            [['forma_pago', 'detalle_forma_pago'], 'string', 'max' => 255]
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
            'fecha' => 'Fecha',
            'forma_pago' => 'Forma Pago',
            'detalle_forma_pago' => 'Detalle Forma Pago',
            'status_pago' => 'Status Pago',
            'nombre_razonsocial' => 'Razón Social',
            'numero_control' => 'Número de Control',
            'numero_factura_control_razon' => '# Factura - # Control - Razón social'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFacturas()
    {
        return $this->hasOne(Facturas::className(), ['id' => 'factura_id']);
    }




}
