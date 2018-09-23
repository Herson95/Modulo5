<h1 class="page-header">Aula</h1>

<div class="well well-sm text-right">
    <a class="btn btn-info" href="?c=Aula&a=Crud">Agregar aula</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th style="width:600px;">Aula</th>
            <th style="width:600px;">Capacidad</th>
            <th style="width:40px;"></th>
            <th style="width:40px;"></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($this->model->Listar() as $r): ?>
        <tr>
            <td><?php echo $r->Aula; ?></td>
            <td><?php echo $r->Capacidad; ?></td>
            <td>
                <a class="btn btn-warning" href="?c=Aula&a=Crud&id=<?php echo $r->AulaID; ?>">Editar</a>
            </td>
            <td>
                <a class="btn btn-danger" onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=Aula&a=Eliminar&id=<?php echo $r->AulaID; ?>">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table> 
