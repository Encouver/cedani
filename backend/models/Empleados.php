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
            'cedula' => 'Cédula',
            'telefono1' => 'Teléfono 1',
            'telefomo2' => 'Teléfono 2',
            'direccion' => 'Dirección',
            'cargo' => 'Cargo',
            'notas' => 'Observaciones',
        ];
    }
}
