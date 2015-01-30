<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "entregas".
 *
 * @property integer $id
 * @property integer $facturas_id
 * @property string $nombre
 * @property string $direccion
 * @property string $telefono
 * @property string $nota
 *
 * @property Facturas $facturas
 */
class Entregas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'entregas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['facturas_id'], 'required'],
            [['facturas_id'], 'integer'],
            [['nombre', 'direccion', 'telefono', 'nota'], 'string', 'max' => 255]
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
            'nombre' => 'Nombre',
            'direccion' => 'Direccion',
            'telefono' => 'Telefono',
            'nota' => 'Nota',
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
