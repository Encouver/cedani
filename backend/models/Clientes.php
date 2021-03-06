<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "clientes".
 *
 * @property integer $id
 * @property string $nombre_razonsocial
 * @property string $domicilio_fiscal
 * @property string $rif
 * @property string $telefono1
 * @property string $telefono2
 * @property string $telefono3
 * @property string $correo
 * @property string $nombre_encargado
 * @property string $telefono_encargado
 * @property string $otro
 *
 * @property Facturas[] $facturas
 */
class Clientes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'clientes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre_razonsocial', 'domicilio_fiscal', 'rif'], 'required'],
            [['nombre_razonsocial', 'domicilio_fiscal', 'rif', 'telefono1', 'telefono2', 'telefono3', 'correo', 'nombre_encargado', 'telefono_encargado', 'otro'], 'string', 'max' => 255],
            [['contribuyente'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre_razonsocial' => 'Nombre o razón social',
            'domicilio_fiscal' => 'Domicilio Fiscal',
            'rif' => 'RIF',
            'telefono1' => 'Teléfono 1',
            'telefono2' => 'Teléfono 2',
            'telefono3' => 'Teléfono 3',
            'correo' => 'Correo electrónico',
            'nombre_encargado' => 'Nombre del encargado',
            'telefono_encargado' => 'Teléfono del encargado',
            'otro' => 'Otro',
            'contribuyente' => 'Contribuyente Especial',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFacturas()
    {
        return $this->hasMany(Facturas::className(), ['cliente_id' => 'id']);
    }
}
