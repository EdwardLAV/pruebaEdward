<?php
namespace app\controllers;

use Yii;
use yii\rest\Controller;
use app\models\Usuario;
use app\components\JwtAuth;
use yii\web\Response;

class LoginController extends Controller
{
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
        $params = json_decode(Yii::$app->request->getRawBody(), true);
        $correo = $params['correo'] ?? null;
        $contrasena = $params['contrasena'] ?? null;

        if (!$correo || !$contrasena) {
            return ['error' => 'Correo y contraseña son obligatorios.'];
        }

        $usuario = Usuario::findOne(['correo' => $correo, 'estado' => true]);
        if (!$usuario || !$usuario->validatePassword($contrasena)) {
            return ['error' => 'Correo o contraseña incorrectos'];
        }

        $jwt = JwtAuth::generarToken([
            'id' => $usuario->id,
            'correo' => $usuario->correo,
            'nombre' => $usuario->nombre,
        ]);

        return ['token' => $jwt, 'usuario' => $usuario];
    }
}
