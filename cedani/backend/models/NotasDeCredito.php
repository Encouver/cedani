<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "notas_de_credito".
 *
 * @property integer $id
 * @property integer $facturas_id
 * @property string $fecha
 * @property integer $compras_id
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
            [['facturas_id', 'compras_id'], 'required'],
            [['facturas_id', 'compras_id'], 'integer'],
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
            'facturas_id' => 'Facturas ID',
            'fecha' => 'Fecha',
            'compras_id' => 'Compras ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompras()
    {
        return $this->hasOne(Compras::className(), ['id' => 'compras_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFacturas()
    {
        return $this->hasOne(Facturas::className(), ['id' => 'facturas_id']);
    }
}
