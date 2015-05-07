<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "inventarios_actual".
 *
 * @property integer $id
 * @property integer $producto_id
 * @property integer $cantidad
 */
class InventariosActual extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'inventarios_actual';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['producto_id', 'cantidad'], 'required'],
            [['producto_id', 'cantidad'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'producto_id' => 'Producto ID',
            'cantidad' => 'Cantidad',
        ];
    }
}
