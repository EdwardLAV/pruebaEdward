<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class Categoria extends ActiveRecord
{
    public static function tableName()
    {
        return 'categorias';
    }

    public function rules()
    {
        return [
            [['nombre'], 'required'],
            [['estado'], 'boolean'],
            [['created_at', 'updated_at'], 'safe'],
            [['nombre'], 'string', 'max' => 100],
            [['estado'], 'default', 'value' => true],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'estado' => 'Estado',
            'created_at' => 'Fecha creación',
            'updated_at' => 'Fecha actualización',
        ];
    }

    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => 'yii\behaviors\TimestampBehavior',
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
                'value' => date('Y-m-d H:i:s'),
            ],
        ];
    }
}
