<?php

namespace app\controllers;

use yii\rest\ActiveController;
use app\models\Usuario;

class UsuarioController extends ActiveController
{
    public $modelClass = 'app\models\Usuario';

    public function behaviors()
    {
        $behaviors = parent::behaviors();
        // Asegurar salida JSON
        $behaviors['contentNegotiator']['formats']['text/html'] = \yii\web\Response::FORMAT_JSON;
        return $behaviors;
    }

    // Hasheo SHA256 automático al crear
    public function beforeAction($action)
    {
        if ($action->id === 'create' || $action->id === 'update') {
            $body = \Yii::$app->request->post();
            if (isset($body['contrasena'])) {
                $body['contrasena'] = hash('sha256', $body['contrasena']);
                \Yii::$app->request->setBodyParams($body);
            }
        }
        return parent::beforeAction($action);
    }

    // Actualizar solo estado
    public function actionEstado($id)
    {
        $model = Usuario::findOne($id);

        if (!$model) {
            return [
                'success' => false,
                'message' => 'Usuario no encontrado',
            ];
        }

        $estado = \Yii::$app->request->post('estado');

        $model->estado = $estado;
        return $model->save()
            ? ['success' => true, 'message' => 'Estado actualizado']
            : ['success' => false, 'message' => 'Error al actualizar estado'];
    }
}
