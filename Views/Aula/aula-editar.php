<h1 class="page-header">
    <?php echo $aul->AulaID != null ? $aul->Aula : 'Nuevo Registro'; ?>
</h1>

<ol class="breadcrumb">
    <li><a href="?c=Aula">Aula</a></li>
    <li class="active">
        <?php echo $aul->AulaID != null ? $aul->Aula : 'Nuevo Registro'; ?>
    </li>
</ol>

<form id="frm-alumno" action="?c=Aula&a=Guardar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $aul->AulaID; ?>" />
    <div class="form-group">
        <label>Aula:</label>
        <input type="text" name="Aula" value="<?php echo $aul->Aula; ?>" class="form-control" placeholder="Ingrese aula"
            data-validacion-tipo="requerido|min:3" />
    </div>


    <div class="form-group">
        <label>Numero del Aula:</label>
        <input type="text" name="Capacidad" value="<?php echo $aul->Capacidad; ?>" class="form-control" placeholder="Ingrese la Capacidad"
            data-validacion-tipo="requerido|min:3" />
    </div>


    <hr />

    <div class="text-right">
        <button class="btn btn-success">Guardar</button>
    </div>
</form>

<script>
    $(document).ready(function() {
        $("#frm-aula").submit(function() {
            return $(this).validate();
        });
    })
</script>