<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<div class="usuario-form container mt-4">

    <div class="card shadow-sm">
        <div class="card-body">

            <?php $form = ActiveForm::begin(); ?>

            <div class="row">
                <div class="col-md-6">
                    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true, 'class'=>'form-control form-control-lg']) ?>
                </div>
                <div class="col-md-6">
                    <?= $form->field($model, 'apellido')->textInput(['maxlength' => true, 'class'=>'form-control form-control-lg']) ?>
                </div>
            </div>

            <?= $form->field($model, 'correo')->textInput(['maxlength' => true, 'class'=>'form-control form-control-lg']) ?>

            <?= $form->field($model, 'edad')->input('number', ['class'=>'form-control form-control-lg']) ?>

            <?= $form->field($model, 'estado')->dropDownList(
                [1 => 'Activo', 0 => 'Inactivo'],
                ['class' => 'form-select form-select-lg']
            ) ?>

            <?= $form->field($model, 'contrasena')->passwordInput(['maxlength' => true, 'class'=>'form-control form-control-lg']) ?>

            <div class="form-group mt-4">
                <?= Html::submitButton('<i class="bi bi-floppy"></i> Guardar', ['class' => 'btn btn-primary btn-lg px-4']) ?>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>

</div>
