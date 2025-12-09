<?php
use yii\helpers\Html;

$this->title = "Detalle de Categoría";
?>

<div class="container mt-4">
    <div class="card shadow-lg border-0">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">
                <i class="bi bi-eye-fill"></i> Detalle de Categoría
            </h4>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <label class="fw-bold">Nombre:</label>
                <p><?= Html::encode($model->nombre) ?></p>
            </div>
            <div class="d-flex gap-2 mt-4">
                <?= Html::a('<i class="bi bi-pencil-square"></i> Editar',
                    ['update', 'id' => $model->id],
                    ['class' => 'btn btn-warning']
                ) ?>
                <?= Html::a('<i class="bi bi-arrow-return-left"></i> Volver',
                    ['index'],
                    ['class' => 'btn btn-secondary']
                ) ?>
            </div>
        </div>
    </div>
</div>
