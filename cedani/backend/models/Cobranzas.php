<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cobranzas".
 *
 * @property integer $id
 * @property integer $facturas_id
 * @property string $fecha
 * @property string $forma_pago
 * @property string $detalle_forma_pago
 * @property string $status_pago
 *
 * @property Facturas $facturas
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
            [['facturas_id', 'fecha'], 'required'],
            [['facturas_id'], 'integer'],
            [['fecha'], 'safe'],
            [['forma_pago', 'detalle_forma_pago', 'status_pago'], 'string', 'max' => 255]
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
            'fecha' => 'Fecha',
            'forma_pago' => 'Forma Pago',
            'detalle_forma_pago' => 'Detalle Forma Pago',
            'status_pago' => 'Status Pago',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFacturas()
    {
        return $this->hasOne(Facturas::className(), ['id' => 'facturas_id']);
    }
}
