<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Usuario $model */

$this->title = 'Actualizar Usuario: ' . $model->nombre . ' ' . $model->apellido;
$this->params['breadcrumbs'][] = ['label' => 'Usuarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Actualizar';
?>

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-header bg-primary text-white py-3 rounded-top-4">
                    <h4 class="mb-0">
                        <i class="fas fa-edit"></i> Actualizar Usuario
                    </h4>
                </div>
                <div class="card-body p-4">
                    <?= $this->render('_form', [
                        'model' => $model,
                    ]) ?>
                </div>
            </div>
            <div class="text-center mt-3">
                <?= Html::a('<i class="bi bi-arrow-left"></i> Regresar', ['index'], ['class' => 'btn btn-secondary px-4']) ?>
            </div>
        </div>
    </div>
</div>
