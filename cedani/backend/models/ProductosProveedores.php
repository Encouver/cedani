<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "productos_proveedores".
 *
 * @property integer $id
 * @property integer $proveedores_id
 *
 * @property Productos[] $productos
 * @property Proveedores $proveedores
 */
class ProductosProveedores extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'productos_proveedores';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['proveedores_id'], 'required'],
            [['proveedores_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'proveedores_id' => 'Proveedores ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductos()
    {
        return $this->hasMany(Productos::className(), ['productos_proveedores_id' => 'id', 'productos_proveedores_proveedores_id' => 'proveedores_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProveedores()
    {
        return $this->hasOne(Proveedores::className(), ['id' => 'proveedores_id']);
    }
}
