<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "notas_de_credito".
 *
 * @property integer $id
 * @property integer $factura_id
 * @property string $fecha
 * @property integer $compra_id
 *
 * @property Compras $compras
 * @property Facturas $facturas
 */
class NotasDeCredito extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'notas_de_credito';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['factura_id', 'compra_id'], 'required'],
            [['factura_id', 'compra_id'], 'integer'],
            [['fecha'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'factura_id' => 'Facturas ID',
            'fecha' => 'Fecha',
            'compra_id' => 'Compras ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompras()
    {
        return $this->hasOne(Compras::className(), ['id' => 'compra_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFacturas()
    {
        return $this->hasOne(Facturas::className(), ['id' => 'factura_id']);
    }
}
