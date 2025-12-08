<?php

namespace app\controllers;

use yii\rest\ActiveController;
use app\models\Categoria;

class CategoriaController extends ActiveController
{
    public $modelClass = 'app\models\Categoria';

    public function behaviors()
    {
        $behaviors = parent::behaviors();
        // Habilitar formato JSON
        $behaviors['contentNegotiator']['formats']['text/html'] = \yii\web\Response::FORMAT_JSON;
        return $behaviors;
    }

    // Endpoint personalizado para actualizar solo el estado
    public function actionEstado($id)
    {
        $model = Categoria::findOne($id);

        if (!$model) {
            return [
                'success' => false,
                'message' => 'Categoría no encontrada',
            ];
        }

        $estado = \Yii::$app->request->post('estado');

        $model->estado = $estado;
        return $model->save()
            ? ['success' => true, 'message' => 'Estado actualizado']
            : ['success' => false, 'message' => 'Error al actualizar estado'];
    }
}
