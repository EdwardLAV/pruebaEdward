<?php

namespace app\components;

use Yii;
use yii\base\ActionFilter;
use yii\web\UnauthorizedHttpException;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class JwtAuth extends ActionFilter
{
    // Método para generar token
    public static function generarToken($data)
    {
        $secret = Yii::$app->params['jwtSecret'];
        $payload = array_merge($data, [
            'iat' => time(),
            'exp' => time() + 3600, // 1 hora de expiración
        ]);

        return JWT::encode($payload, $secret, 'HS256');
    }

    // Filtro que valida token en cada request
    public function beforeAction($action)
    {
        if ($action->controller->id === 'login') {
            return true; // No proteger login
        }

        $authHeader = Yii::$app->request->headers->get('Authorization');

        if (!$authHeader || !preg_match('/^Bearer\s+(.*)$/i', $authHeader, $matches)) {
            throw new UnauthorizedHttpException('Token no proporcionado');
        }

        $jwt = $matches[1];

        $secret = Yii::$app->params['jwtSecret'];

        try {
            $payload = JWT::decode($jwt, new Key($secret, 'HS256'));
            Yii::$app->user->id = $payload->id;
            return true;

        } catch (\Exception $e) {
            throw new UnauthorizedHttpException('Token inválido o expirado');
        }
    }
}
