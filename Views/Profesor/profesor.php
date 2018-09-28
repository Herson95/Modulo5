<h1 class="page-header">Profesor</h1>

<div class="well well-sm text-right">
    <a class="btn btn-primary" href="?c=Profesor&a=Crud">Nuevo profesor</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th style="width:180px;">Nombre</th>
            <th>Apellido</th>
            <th>Dui</th>
            <th style="width:120px;">Telefono</th>
            <th style="width:120px;">Estado</th>
            <th style="width:60px;"></th>
            <th style="width:60px;"></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($this->model->Listar() as $r): ?>
        <tr>
            <td>
                <?php echo $r->Nombre; ?>
            </td>
            <td>
                <?php echo $r->Apellido; ?>
            </td>
            <td>
                <?php echo $r->Dui; ?>
            </td>
            <td>
                <?php echo $r->Telefono; ?>
            </td>
            <td>
                <?php echo $r->Estado; ?>
            </td>
            <td>
                <a href="?c=Profesor&a=Crud&id=<?php echo $r->ProfesorID; ?>">Editar</a>
            </td>
            <td>
                <a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=Profesor&a=Eliminar&id=<?php echo $r->ProfesorID; ?>">Eliminar</a>
            </td>
        </tr>
        <?php endforeach;?>
    </tbody>
</table>