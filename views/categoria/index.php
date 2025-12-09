<?php
use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'Categorías Registradas';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container mt-4">
    <div class="card shadow-lg border-0">
        <div class="card-header bg-primary text-white py-3">
            <h3 class="mb-0 text-center">
                <i class="bi bi-people-fill"> </i><b>Gestión de Categorias</b> 
            </h3>
        </div>
        <div class="card-body">
            <div class="mb-3 text-end">
                <?= Html::a('<i class="bi bi-person-plus"></i> Crear Categoria', ['create'], ['class' => 'btn btn-success btn-lg']) ?>
            </div>
            <div class="table-responsive">
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'summary' => 'Mostrando <b>{begin}-{end}</b> de <b>{totalCount}</b> registros.',
                    'tableOptions' => ['class' => 'table table-hover table-striped align-middle mb-0'],
                    'headerRowOptions' => ['class' => 'table-primary'],
                    'columns' => [
                        [
                            'class' => 'yii\grid\SerialColumn',
                            'header' => 'Nº',
                            'contentOptions' => ['style' => 'font-size:14px; font-weight:bold; text-align:center; width:40px;'],
                        ],
                        'nombre',
                        [
                            'class' => 'yii\grid\ActionColumn',
                            'header' => 'Acciones',
                            'headerOptions' => ['style' => 'text-align:center; width:130px;'],
                            'contentOptions' => ['style' => 'text-align:center;'],
                            'template' => '<div class="btn-group" role="group">{view} {update} {delete}</div>',
                            'contentOptions' => ['class' => 'text-center'],
                            'buttons' => [
                                'view' => function($url) {
                                    return Html::a('<i class="bi bi-eye-fill"></i>', $url, [
                                        'class' => 'btn btn-sm btn-info',
                                        'title' => 'Ver',
                                    ]);
                                },
                                'update' => function($url) {
                                    return Html::a('<i class="bi bi-pencil-fill"></i>', $url, [
                                        'class' => 'btn btn-sm btn-warning text-white',
                                        'title' => 'Actualizar',
                                    ]);
                                },
                                'delete' => function ($url, $model) {
                                    return Html::a(
                                        '<i class="bi bi-trash"></i>',
                                        $url,
                                        [
                                            'class' => 'btn btn-sm btn-danger btn-delete',
                                            'title' => 'Eliminar',
                                        ]
                                    );
                                },
                            ]
                        ],
                    ],
                ]); ?>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalDelete" tabindex="-1" aria-labelledby="modalDeleteLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-danger text-white">
        <h5 class="modal-title" id="modalDeleteLabel">Confirmar eliminación</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        ¿Seguro que deseas eliminar este registro? Esta acción no se puede deshacer.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <a id="btn-confirm-delete" class="btn btn-danger">Eliminar</a>
      </div>
    </div>
  </div>
</div>

<?php
$js = <<<JS
// Cuando se hace clic en el botón eliminar
$(document).on('click', '.btn-delete', function(e) {
    e.preventDefault();
    let url = $(this).attr('href');
    $('#btn-confirm-delete').attr('href', url); 
    $('#modalDelete').modal('show');
});
JS;
$this->registerJs($js);
?>