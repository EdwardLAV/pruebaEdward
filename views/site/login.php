<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Iniciar Sesión';
?>

<div class="container" style="max-width: 400px; margin-top: 100px;">
    <div class="card shadow">
        <div class="card-header text-center bg-primary text-white">
            <h3><?= Html::encode($this->title) ?></h3>
        </div>
        <div class="card-body">
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

            <div class="form-group">
                <?= $form->field($model, 'correo')->textInput(['placeholder' => 'Correo electrónico'])->label(false) ?>
            </div>

            <div class="form-group">
                <?= $form->field($model, 'contrasena')->passwordInput(['placeholder' => 'Contraseña'])->label(false) ?>
            </div>
            
            <div class="form-group">
                <?= Html::submitButton('Iniciar Sesión', ['class' => 'btn btn-primary btn-block', 'name' => 'login-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
