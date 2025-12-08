<?php

namespace app\controllers;

use Yii;
use app\components\JwtAuth;
use yii\rest\ActiveController;
use yii\web\Response;
use yii\filters\Cors;

class UsuarioController extends ActiveController
{
    public $modelClass = 'app\models\Usuario';

    public function behaviors()
    {
        $behaviors = parent::behaviors();

         // CORS (para permitir frontend)
        $behaviors['corsFilter'] = [
            'class' => Cors::class,
        ];

        // JWT Auth
        $behaviors['authenticator'] = [
            'class' => JwtAuth::class,
        ];
        
        // Respuesta JSON
        $behaviors['contentNegotiator']['formats'] = [
            'application/json' => Response::FORMAT_JSON,
        ];

        return $behaviors;
    }

    // Cambiar estado (activar/desactivar)
    public function actionEstado($id)
    {
        $usuario = ($this->modelClass)::findOne($id);

        if (!$usuario) {
            return ['error' => 'Usuario no encontrado'];
        }

        $usuario->estado = !$usuario->estado;
        $usuario->save(false);

        return ['status' => 'ok', 'nuevo_estado' => $usuario->estado];
    }
}
