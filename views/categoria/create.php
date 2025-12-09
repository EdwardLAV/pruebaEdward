<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Crear Categoría';
?>

<div class="categoria-create container mt-5" style="max-width: 600px;">
    <div class="card shadow-lg border-0">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">
                <i class="bi bi-plus-circle"></i> Crear Categoría
            </h4>
        </div>
        <div class="card-body p-4">
            <?php $form = ActiveForm::begin(); ?>
            <div class="row">
                <div class="col-md-12">
                    <?= $form->field($model, 'nombre')->textInput(['placeholder' => 'Ingrese Categoria']) ?>
                </div>
            </div>
            <div class="mt-0 d-flex justify-content-between">
                <?= Html::a('<i class="bi bi-arrow-left"></i> Regresar', ['categoria/index'], ['class' => 'btn btn-secondary rounded-3']) ?>
                <?= Html::submitButton(
                    '<i class="bi bi-floppy"></i> Guardar Usuario',
                    ['class' => 'btn btn-success px-4']
                ) ?>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
