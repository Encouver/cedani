<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tareas".
 *
 * @property integer $id
 * @property string $fecha
 * @property string $tarea
 * @property integer $completado
 * @property string $recordatorio
 * @property integer $prioridad
 */
class Tareas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tareas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fecha', 'tarea', 'completado'], 'required'],
            [['fecha', 'recordatorio'], 'safe'],
            [['completado', 'prioridad'], 'integer'],
            [['tarea'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fecha' => 'Fecha',
            'tarea' => 'Tarea',
            'completado' => 'Completado',
            'recordatorio' => 'Recordatorio',
            'prioridad' => 'Prioridad',
        ];
    }
}
