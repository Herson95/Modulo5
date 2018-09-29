<h1 class="page-header">Horario</h1>

<div class="well well-sm text-right">
    <a class="btn btn-info" href="?c=Horario&a=Crud">Agregar Horario</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th style="width:200px;">Dia</th>
            <th style="width:200px;">Hora inicio</th>
            <th style="width:200px;">Hora fin</th>
            <th style="width:40px;"></th>
            <th style="width:40px;"></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($this->model->Listar() as $r): ?>
        <tr>
            <td>
                <?php echo $r->Dia; ?>
            </td>
            <td>
                <?php echo $r->Hora_inicio; ?>
            </td>
            <td>
                <?php echo $r->Hora_fin; ?>
            </td>
            <td>
                <a class="btn btn-warning" href="?c=Horario&a=Crud&HorarioID=<?php echo $r->HorarioID; ?>">Editar</a>
            </td>
            <td>
                <a class="btn btn-danger" onclick="javascript:return confirm('¿Seguro de eliminar este registro?');"
                    href="?c=Horario&a=Eliminar&HorarioID=<?php echo $r->HorarioID; ?>">Eliminar</a>
            </td>
        </tr>
        <?php endforeach;?>
    </tbody>
</table>