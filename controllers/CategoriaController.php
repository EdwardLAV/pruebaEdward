<?php

namespace app\controllers;

use Yii;
use app\components\JwtAuth;
use yii\rest\ActiveController;
use yii\web\Response;
use yii\filters\Cors;

class CategoriaController extends ActiveController
{
    public $modelClass = 'app\models\Categoria';

    public function behaviors()
    {
        $behaviors = parent::behaviors();

        // CORS
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

    // Activar / desactivar
    public function actionEstado($id)
    {
        $categoria = ($this->modelClass)::findOne($id);

        if (!$categoria) {
            return ['error' => 'Categoría no encontrada'];
        }

        $categoria->estado = !$categoria->estado;
        $categoria->save(false);

        return ['status' => 'ok', 'nuevo_estado' => $categoria->estado];
    }
}
