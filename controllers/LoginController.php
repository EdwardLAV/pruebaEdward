<?php

namespace app\controllers;

use Yii;
use yii\rest\Controller;
use yii\web\Response;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use app\models\Usuario;

class LoginController extends Controller
{
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        // El login NO necesita autenticación
        unset($behaviors['authenticator']);
        
        $behaviors['contentNegotiator']['formats']['application/json'] = Response::FORMAT_JSON;
        return $behaviors;
    }

    /** POST /login */
    public function actionIndex()
    {
        $body = Yii::$app->request->post();
        $correo = $body['correo'] ?? null;
        $password = $body['contrasena'] ?? null;

        // Buscar usuario
        $user = Usuario::findOne(['correo' => $correo]);

        if (!$user) {
            return ['success' => false, 'message' => 'Usuario no encontrado'];
        }

        // Validar contraseña SHA256
        if ($user->contrasena !== hash('sha256', $password)) {
            return ['success' => false, 'message' => 'Contraseña incorrecta'];
        }

        // Crear Token JWT
        $key = Yii::$app->params['jwtSecret'];
        $expire = time() + Yii::$app->params['jwtExpire'];

        $payload = [
            'iss' => 'yii2-api',
            'aud' => 'yii2-users',
            'iat' => time(),
            'exp' => $expire,
            'data' => [
                'id' => $user->id,
                'correo' => $user->correo,
            ]
        ];

        $jwt = JWT::encode($payload, $key, 'HS256');

        return [
            'success' => true,
            'token' => $jwt,
            'expires_in' => Yii::$app->params['jwtExpire']
        ];
    }
}
