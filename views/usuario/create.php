<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Crear Usuario';
$this->params['breadcrumbs'][] = ['label' => 'Usuarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container mt-4">
    <div class="card shadow-lg border-0 rounded-4">
        <div class="card-header bg-primary text-white py-3 rounded-top-4">
            <h4 class="mb-0">
                <i class="fas fa-user-plus me-2"></i> Crear Nuevo Usuario
            </h4>
        </div>
        <div class="card-body p-4">
            <?php $form = ActiveForm::begin(); ?>
            <div class="row">
                <div class="col-md-6">
                    <?= $form->field($model, 'nombre')->textInput(['placeholder' => 'Ingrese nombre']) ?>
                </div>
                <div class="col-md-6">
                    <?= $form->field($model, 'apellido')->textInput(['placeholder' => 'Ingrese apellido']) ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($model, 'edad')->input('number') ?>
                </div>
                <div class="col-md-8">
                    <?= $form->field($model, 'correo')->input('email') ?>
                </div>
                <div class="col-md-12">
                    <?= $form->field($model, 'contrasena')->passwordInput(['placeholder' => 'Contraseña segura']) ?>
                </div>
            </div>
            <div class="mt-4 d-flex justify-content-between">
                <?= Html::a('<i class="bi bi-arrow-left"></i> Regresar', ['usuario/index'], ['class' => 'btn btn-secondary rounded-3']) ?>
                <?= Html::submitButton(
                    '<i class="bi bi-floppy"></i> Guardar Usuario',
                    ['class' => 'btn btn-success px-4']
                ) ?>

            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
