<?php

namespace app\controllers;

use Yii;
use yii\rest\Controller;
use app\models\Categoria;
use app\components\JwtAuth;
use yii\web\Response;

class CategoriaController extends Controller
{
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => JwtAuth::class,
            'except' => [], // TODAS las rutas requieren token
        ];
        $behaviors['contentNegotiator']['formats']['application/json'] = Response::FORMAT_JSON;

        return $behaviors;
    }

    /** GET /categorias */
    public function actionIndex()
    {
        return Categoria::find()->all();
    }

    /** GET /categorias/{id} */
    public function actionView($id)
    {
        return Categoria::findOne($id);
    }

    /** POST /categorias */
    public function actionCreate()
    {
        $model = new Categoria();
        $model->load(Yii::$app->request->post(), '');
        
        if ($model->save()) {
            return ['success' => true, 'data' => $model];
        }

        return ['success' => false, 'errors' => $model->errors];
    }

    /** PUT /categorias/{id} */
    public function actionUpdate($id)
    {
        $model = Categoria::findOne($id);
        $model->load(Yii::$app->request->post(), '');

        if ($model->save()) {
            return ['success' => true, 'data' => $model];
        }

        return ['success' => false, 'errors' => $model->errors];
    }

    /** PATCH /categorias/{id}/estado */
    public function actionEstado($id)
    {
        $model = Categoria::findOne($id);
        $model->estado = !$model->estado;
        $model->save(false);

        return ['success' => true, 'nuevo_estado' => $model->estado];
    }
}
