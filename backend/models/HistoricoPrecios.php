<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "historico_precios".
 *
 * @property integer $id
 * @property integer $producto_id
 * @property string $precio
 * @property string $fecha
 *
 * @property Productos $producto
 */
class HistoricoPrecios extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'historico_precios';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['producto_id', 'precio'], 'required'],
            [['producto_id'], 'integer'],
            [['precio'], 'number'],
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
            'producto_id' => 'Producto ID',
            'precio' => 'Precio',
            'fecha' => 'Fecha',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducto()
    {
        return $this->hasOne(Productos::className(), ['id' => 'producto_id']);
    }
}
