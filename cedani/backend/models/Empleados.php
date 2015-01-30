<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "empleados".
 *
 * @property integer $id
 * @property string $nombre
 * @property string $apellido
 * @property string $cedula
 * @property string $telefono1
 * @property string $telefomo2
 * @property string $direccion
 * @property string $cargo
 * @property string $notas
 */
class Empleados extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'empleados';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre', 'apellido'], 'required'],
            [['nombre', 'apellido', 'cedula', 'telefono1', 'telefomo2', 'direccion', 'cargo', 'notas'], 'string', 'max' => 255]
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
            'cedula' => 'Cedula',
            'telefono1' => 'Telefono1',
            'telefomo2' => 'Telefomo2',
            'direccion' => 'Direccion',
            'cargo' => 'Cargo',
            'notas' => 'Notas',
        ];
    }
}
