<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class Usuario extends ActiveRecord
{
    public static function tableName()
    {
        return 'usuarios';
    }

    public function rules()
    {
        return [
            [['nombre', 'apellido', 'edad', 'correo', 'contrasena'], 'required'],
            [['edad'], 'integer'],
            [['estado'], 'boolean'],
            [['created_at', 'updated_at'], 'safe'],
            [['nombre', 'apellido'], 'string', 'max' => 100],
            [['correo'], 'string', 'max' => 150],
            [['correo'], 'unique'],
            [['contrasena'], 'string', 'max' => 255],

            [['estado'], 'default', 'value' => true],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'apellido' => 'Apellido',
            'edad' => 'Edad',
            'correo' => 'Correo',
            'contrasena' => 'Contraseña',
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

    public function validatePassword($password)
    {
        return $password === $this->contrasena;
    }
}
