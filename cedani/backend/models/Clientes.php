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
            [['nombre_razonsocial', 'domicilio_fiscal', 'rif', 'telefono1', 'telefono2', 'telefono3', 'correo', 'nombre_encargado', 'telefono_encargado', 'otro'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre_razonsocial' => 'Nombre Razonsocial',
            'domicilio_fiscal' => 'Domicilio Fiscal',
            'rif' => 'Rif',
            'telefono1' => 'Telefono1',
            'telefono2' => 'Telefono2',
            'telefono3' => 'Telefono3',
            'correo' => 'Correo',
            'nombre_encargado' => 'Nombre Encargado',
            'telefono_encargado' => 'Telefono Encargado',
            'otro' => 'Otro',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFacturas()
    {
        return $this->hasMany(Facturas::className(), ['clientes_id' => 'id']);
    }
}
