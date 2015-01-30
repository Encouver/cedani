<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "configuraciones".
 *
 * @property integer $id
 * @property string $IVA
 */
class Configuraciones extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'configuraciones';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IVA'], 'required'],
            [['IVA'], 'number']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'IVA' => 'Iva',
        ];
    }
}
