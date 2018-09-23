<h1 class="page-header">Asignaturas</h1>

<div class="well well-sm text-right">
    <a class="btn btn-info" href="?c=Asignatura&a=Crud">Agregar asignatura</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th style="width:400px;">Nombre</th>
            <th style="width:200px;">Unidades Valorativas</th>
            <th style="width:40px;"></th>
            <th style="width:40px;"></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($this->model->Listar() as $r): ?>
        <tr>
            <td><?php echo $r->Asignatura; ?></td>
            <td><?php echo $r->UV; ?></td>
            <td>
                <a class="btn btn-warning" href="?c=Asignatura&a=Crud&AsignaturaID=<?php echo $r->AsignaturaID; ?>">Editar</a>
            </td>
            <td>
                <a class="btn btn-danger" onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=Asignatura&a=Eliminar&AsignaturaID=<?php echo $r->AsignaturaID; ?>">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>