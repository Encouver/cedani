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
            'id' => Yii::t('app', 'ID'),
            'fecha' => Yii::t('app', 'Fecha'),
            'tarea' => Yii::t('app', 'Tarea'),
            'completado' => Yii::t('app', 'Completado'),
            'recordatorio' => Yii::t('app', 'Recordatorio'),
            'prioridad' => Yii::t('app', 'Prioridad'),
        ];
    }
}
