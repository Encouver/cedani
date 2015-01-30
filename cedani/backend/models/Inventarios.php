<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "inventarios".
 *
 * @property integer $id
 * @property integer $productos_id
 * @property integer $cantidad
 *
 * @property Productos $productos
 */
class Inventarios extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'inventarios';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['productos_id', 'cantidad'], 'required'],
            [['productos_id', 'cantidad'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'productos_id' => 'Productos ID',
            'cantidad' => 'Cantidad',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductos()
    {
        return $this->hasOne(Productos::className(), ['id' => 'productos_id']);
    }
}
