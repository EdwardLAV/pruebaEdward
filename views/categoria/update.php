<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Editar Categoría';
?>

<div class="container mt-4">
    <div class="card shadow-lg border-0">
        <div class="card-header bg-warning text-dark">
            <h4 class="mb-0">
                <i class="bi bi-pencil-square"></i> Editar Categoría
            </h4>
        </div>
        <div class="card-body p-4">
            <?php $form = ActiveForm::begin(); ?>
            <div class="col-md-12 mb-3">
                <?= $form->field($model, 'nombre')->textInput([
                    'placeholder' => 'Ingrese el nuevo nombre de la categoría'
                ]) ?>
            </div>
            <div class="mt-3">
                <?= Html::submitButton(
                    '<i class="bi bi-save"></i> Guardar Cambios',
                    ['class' => 'btn btn-success']
                ) ?>
                <?= Html::a(
                    '<i class="bi bi-arrow-left"></i> Volver',
                    ['index'],
                    ['class' => 'btn btn-secondary ms-2']
                ) ?>
            </div>
            <?php ActiveForm::end(); ?>
        
        </div>
    </div>
</div>
