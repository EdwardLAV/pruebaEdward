<?php

namespace app\controllers;

use Yii;
use yii\rest\Controller;
use yii\web\Response;
use app\models\Usuario;

class UsuarioController extends Controller
{
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['contentNegotiator']['formats']['application/json'] = Response::FORMAT_JSON;

        return $behaviors;
    }

    /** GET /usuarios */
    public function actionIndex()
    {
        return Usuario::find()->all();
    }

    /** GET /usuarios/{id} */
    public function actionView($id)
    {
        return Usuario::findOne($id);
    }

    /** POST /usuarios */
    public function actionCreate()
    {
        $model = new Usuario();
        $model->load(Yii::$app->request->post(), '');

        if ($model->save()) {
            return ['success' => true, 'data' => $model];
        }

        return ['success' => false, 'errors' => $model->errors];
    }

    /** PUT /usuarios/{id} */
    public function actionUpdate($id)
    {
        $model = Usuario::findOne($id);
        $model->load(Yii::$app->request->post(), '');

        if ($model->save()) {
            return ['success' => true, 'data' => $model];
        }

        return ['success' => false, 'errors' => $model->errors];
    }

    /** PATCH /usuarios/{id}/estado */
    public function actionEstado($id)
    {
        $model = Usuario::findOne($id);
        $model->estado = !$model->estado;
        $model->save(false);

        return ['success' => true, 'nuevo_estado' => $model->estado];
    }
}
