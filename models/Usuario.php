<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

class Usuario extends ActiveRecord implements IdentityInterface
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

    /**
     * IdentityInterface methods
     */
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        // No se usa en JWT, pero es obligatorio
        return null;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        return null;
    }

    public function validateAuthKey($authKey)
    {
        return true;
    }

   public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {

            // Si la contraseña fue modificada, se vuelve a hashear
            if ($this->isAttributeChanged('contrasena')) {
                $this->contrasena = hash('sha256', $this->contrasena);
            }

            return true;
        }
        return false;
    }

    public function validatePassword($password)
    {
        return hash('sha256', $password) === $this->contrasena;
    }
}
