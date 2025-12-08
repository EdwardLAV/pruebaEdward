<?php

namespace app\controllers;

use Yii;
use yii\rest\Controller;
use app\models\Usuario;
use app\components\JwtAuth;
use yii\web\Response;

class LoginController extends Controller
{
    public $enableCsrfValidation = false;
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['contentNegotiator']['formats'] = [
            'application/json' => Response::FORMAT_JSON,
        ];

        return $behaviors;
    }

    public function actionIndex()
    {
       Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        $request = Yii::$app->request;

       // GET opcional para pruebas
        $correo = $request->get('correo');
        $password = $request->get('contrasena');

        // POST JSON o form-data
        if (!$correo || !$password) {
            $correo = $request->post('correo');
            $password = $request->post('contrasena');
        }

        if (!$correo || !$password) {
            return ['error' => 'Correo y contraseña son obligatorios.'];
        }

        $usuario = Usuario::findOne(['correo' => $correo, 'estado' => true]);

        if (!$usuario) {
            return ['error' => 'Usuario no encontrado o inactivo.'];
        }

        // Hash SHA256
        if (!$usuario->validatePassword($password)) {
            return ['error' => 'Contraseña incorrecta'];
        }

        // Generar token
        $jwt = JwtAuth::generarToken([
            'id' => $usuario->id,
            'correo' => $usuario->correo,
            'nombre' => $usuario->nombre,
        ]);

        return [
            'token' => $jwt,
            'usuario' => [
                'id' => $usuario->id,
                'nombre' => $usuario->nombre,
                'correo' => $usuario->correo
            ]
        ];
    }
}
