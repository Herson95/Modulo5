<h1 class="page-header">Asignaciones</h1>

<div class="well well-sm text-right">
    <a class="btn btn-primary" href="?c=Asignacion&a=Crud">Nuevo asignacion</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Aula</th>
            <th>Asignatura</th>
            <th>Horario</th>
            <th style="width:60px;"></th>
            <th style="width:60px;"></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($this->model->Listar() as $r): ?>
        <tr>
            <td>
                <?php echo $r->AULA; ?>
            </td>
            <td>
                <?php echo $r->ASIGNATURA; ?>
            </td>
            <td>
                <?php echo $r->HORARIO; ?>
            </td>
            <td>
                <a href="?c=Asignacion&a=Crud&RelacionID=<?php echo $r->RelacionID; ?>">Editar</a>
            </td>
            <td>
                <a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=Asignacion&a=Eliminar&RelacionID=<?php echo $r->RelacionID; ?>">Eliminar</a>
            </td>
        </tr>
        <?php endforeach;?>
    </tbody>
</table>