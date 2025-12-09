<?php
namespace app\models;

use Yii;
use yii\base\Model;
use app\models\Usuario;

class LoginForm extends Model
{
    public $correo;
    public $contrasena;

    private $_user = false;

    public function rules()
    {
        return [
            [['correo', 'contrasena'], 'required'],
            ['contrasena', 'validatePassword'],
        ];
    }

    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if (!$user || !$user->validatePassword($this->contrasena)) {
                $this->addError($attribute, 'Correo o contraseña incorrectos.');
            }
        }
    }

    public function login()
    {
        if ($this->validate()) {
            return Yii::$app->user->login($this->getUser());
        }
        return false;
    }

    public function getUser()
    {
        if ($this->_user === false) {
            $this->_user = Usuario::findOne(['correo' => $this->correo, 'estado' => true]);
        }
        return $this->_user;
    }
}
