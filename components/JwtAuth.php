<?php
namespace app\components;

use Yii;
use yii\filters\auth\AuthMethod;
use yii\web\UnauthorizedHttpException;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use \app\models\Usuario;

class JwtAuth extends AuthMethod
{
    public $header = 'Authorization';
    public $pattern = '/^Bearer\s+(.*?)$/';

    public function authenticate($user, $request, $response)
    {
        $authHeader = $request->getHeaders()->get($this->header);
        if ($authHeader !== null && preg_match($this->pattern, $authHeader, $matches)) {
            $jwt = $matches[1];
            $secret = Yii::$app->params['jwtSecret'];
            try {
                $payload = JWT::decode($jwt, new Key($secret, 'HS256'));
                $usuario = Usuario::findOne($payload->id);
                if (!$usuario) {
                    throw new UnauthorizedHttpException('Usuario no encontrado');
                }
                return $usuario;
            } catch (\Exception $e) {
                throw new UnauthorizedHttpException('Token inválido o expirado');
            }
        }

        throw new UnauthorizedHttpException('Token no proporcionado');
    }
    
    // Generar token
    public static function generarToken($data)
    {
        $secret = Yii::$app->params['jwtSecret'];
        $expire = Yii::$app->params['jwtExpire'] ?? 3600;
        $payload = array_merge($data, [
            'iat' => time(),
            'exp' => time() + $expire,
        ]);
        return JWT::encode($payload, $secret, 'HS256');
    }
}
