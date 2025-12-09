<?php
use yii\helpers\Html;

$this->title = 'Dashboard';
?>

<div class="container mt-5">

    <div class="text-center mb-4">
        <h1 class="fw-bold">
            👋 Bienvenido, <?= Html::encode(Yii::$app->user->identity->nombre) ?>
        </h1>
        <p class="text-muted">Panel principal del sistema</p>
    </div>

    <div class="row justify-content-center">

        <!-- Card Usuarios -->
        <div class="col-md-4 mb-4">
            <div class="card shadow-lg border-0 h-100">
                <div class="card-body text-center">
                    <div class="display-4 mb-3">👤</div>
                    <h4 class="card-title fw-bold">Usuarios</h4>
                    <p class="card-text text-muted">Gestiona los usuarios registrados</p>
                    <?= Html::a(
                        'Ingresar',
                        ['usuario/index'],
                        ['class' => 'btn btn-primary btn-lg w-100']
                    ) ?>
                </div>
            </div>
        </div>

        <!-- Card Categorías -->
        <div class="col-md-4 mb-4">
            <div class="card shadow-lg border-0 h-100">
                <div class="card-body text-center">
                    <div class="display-4 mb-3">📂</div>
                    <h4 class="card-title fw-bold">Categorías</h4>
                    <p class="card-text text-muted">Administra las categorías del sistema</p>
                    <?= Html::a(
                        'Ingresar',
                        ['categoria/index'],
                        ['class' => 'btn btn-success btn-lg w-100']
                    ) ?>
                </div>
            </div>
        </div>

    </div>

</div>
