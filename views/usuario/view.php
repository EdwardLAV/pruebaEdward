<?php
use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = 'Detalles del Usuario';
?>
<div class="usuario-view container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="fw-bold"><?= Html::encode($this->title) ?></h1>
        <div>
            <?= Html::a('✏️ Editar', ['update', 'id'=>$model->id], ['class'=>'btn btn-warning btn-lg']) ?>
            <?= Html::a('⬅️ Volver', ['index'], ['class'=>'btn btn-secondary btn-lg']) ?>
        </div>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">

            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'id',
                    'nombre',
                    'apellido',
                    'correo',
                    'edad',
                    [
                        'attribute' => 'estado',
                        'format' => 'raw',
                        'value' => $model->estado 
                            ? '<span class="badge bg-success">Activo</span>' 
                            : '<span class="badge bg-danger">Inactivo</span>',
                    ],
                    'created_at',
                ],
            ]) ?>

        </div>
    </div>
</div>
