<?php

namespace app\components;

use Yii;
use yii\filters\auth\AuthMethod;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use yii\web\UnauthorizedHttpException;

class JwtAuth extends AuthMethod
{
    public function authenticate($user, $request, $response)
    {
        $authHeader = $request->getHeaders()->get('Authorization');

        if ($authHeader && preg_match('/^Bearer\s+(.*)$/', $authHeader, $matches)) {
            $token = $matches[1];

            try {
                $data = JWT::decode($token, new Key(Yii::$app->params['jwtSecret'], 'HS256'));
                return $user->loginByAccessToken($token, get_class($this));
            } catch (\Exception $e) {
                throw new UnauthorizedHttpException("Token inválido o expirado");
            }
        }

        return null;
    }
}
