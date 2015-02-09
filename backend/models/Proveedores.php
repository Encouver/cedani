<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "proveedores".
 *
 * @property integer $id
 * @property string $nombre
 * @property string $apellido
 * @property string $telefono1
 * @property string $telefono2
 * @property string $telefono3
 * @property string $direccion
 * @property string $correo
 * @property string $cuenta_bancaria1
 * @property string $banco_cuenta_bancaria1
 * @property string $datos_cuenta_bancaria1
 * @property string $cuenta_bancaria2
 * @property string $banco_cuenta_bancaria2
 * @property string $datos_cuenta_bancaria2
 * @property string $cuenta_bancaria3
 * @property string $banco_cuenta_bancaria3
 * @property string $datos_cuenta_bancaria3
 * @property string $notas
 *
 * @property ProductosProveedores[] $productosProveedores
 */
class Proveedores extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'proveedores';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre', 'apellido', 'telefono1', 'telefono2', 'telefono3', 'direccion', 'correo', 'cuenta_bancaria1', 'banco_cuenta_bancaria1', 'datos_cuenta_bancaria1', 'cuenta_bancaria2', 'banco_cuenta_bancaria2', 'datos_cuenta_bancaria2', 'cuenta_bancaria3', 'banco_cuenta_bancaria3', 'datos_cuenta_bancaria3', 'notas'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'apellido' => 'Apellido',
            'telefono1' => 'Telefono1',
            'telefono2' => 'Telefono2',
            'telefono3' => 'Telefono3',
            'direccion' => 'Direccion',
            'correo' => 'Correo',
            'cuenta_bancaria1' => 'Cuenta Bancaria1',
            'banco_cuenta_bancaria1' => 'Banco Cuenta Bancaria1',
            'datos_cuenta_bancaria1' => 'Datos Cuenta Bancaria1',
            'cuenta_bancaria2' => 'Cuenta Bancaria2',
            'banco_cuenta_bancaria2' => 'Banco Cuenta Bancaria2',
            'datos_cuenta_bancaria2' => 'Datos Cuenta Bancaria2',
            'cuenta_bancaria3' => 'Cuenta Bancaria3',
            'banco_cuenta_bancaria3' => 'Banco Cuenta Bancaria3',
            'datos_cuenta_bancaria3' => 'Datos Cuenta Bancaria3',
            'notas' => 'Notas',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductosProveedores()
    {
        return $this->hasMany(ProductosProveedores::className(), ['proveedore_id' => 'id']);
    }
}
