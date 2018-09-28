<h1 class="page-header">
    <?php echo $prof->ProfesorID != null ? $prof->Nombre : 'Nuevo Registro'; ?>
</h1>

<ol class="breadcrumb">
    <li><a href="?c=Profesor">Profesor</a></li>
    <li class="active">
        <?php echo $prof->ProfesorID != null ? $prof->Nombre : 'Nuevo Registro'; ?>
    </li>
</ol>

<form id="frm-Profesor" action="?c=Profesor&a=Guardar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $prof->ProfesorID; ?>" />

    <div class="form-group">
        <label>Nombre</label>
        <input type="text" name="Nombre" value="<?php echo $prof->Nombre; ?>" class="form-control" placeholder="Ingrese su nombre"
            data-validacion-tipo="requerido|min:3" />
    </div>

    <div class="form-group">
        <label>Apellido</label>
        <input type="text" name="Apellido" value="<?php echo $prof->Apellido; ?>" class="form-control" placeholder="Ingrese su apellido"
            data-validacion-tipo="requerido|min:10" />
    </div>

    <div class="form-group">
        <label>Dui</label>
        <input type="text" name="Dui" value="<?php echo $prof->Dui; ?>" class="form-control" placeholder="Ingrese su Dui"
            data-validacion-tipo="requerido|min:10" />
    </div>

    <div class="form-group">
        <label>Telefono</label>
        <input type="text" name="Telefono" value="<?php echo $prof->Telefono; ?>" class="form-control" placeholder="Ingrese su Telefono"
            data-validacion-tipo="requerido|min:10" />
    </div>

    <div class="form-group">
        <label>Estado</label>
        <input type="text" name="Estado" value="<?php echo $prof->Estado; ?>" class="form-control" placeholder="Ingrese su Estado"
            data-validacion-tipo="requerido|min:10" />
    </div>

    <hr />

    <div class="text-right">
        <button class="btn btn-success">Guardar</button>
    </div>
</form>

<script>
    $(document).ready(function() {
        $("#frm-alumno").submit(function() {
            return $(this).validate();
        });
    })
</script>