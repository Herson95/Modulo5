<h1 class="page-header">Alumnos</h1>

<div class="well well-sm text-right">
    <a class="btn btn-info" href="?c=Alumno&a=Crud">Nuevo alumno</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th style="width:180px;">Nombre</th>
            <th>Apellido</th>
            <th>Genero</th>
            <th style="width:120px;">Nacimiento</th>
            <th style="width:120px;">Telefono</th>
            <th style="width:60px;"></th>
            <th style="width:60px;"></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($this->model->Listar() as $r): ?>
        <tr>
            <td><?php echo $r->Nombre; ?></td>
            <td><?php echo $r->Apellido; ?></td>
            <td><?php echo $r->Genero == 1 ? 'Hombre' : 'Mujer'; ?></td>
            <td><?php echo $r->FechaNacimiento; ?></td>
            <td><?php echo $r->Telefono; ?></td>
            <td>
                <a href="?c=Alumno&a=Crud&id=<?php echo $r->AlumnoID; ?>">Editar</a>
            </td>
            <td>
                <a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=Alumno&a=Eliminar&id=<?php echo $r->AlumnoID; ?>">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table> 
