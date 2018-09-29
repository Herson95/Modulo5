<h1 class="page-header">
    <?php echo $hro->HorarioID != null ? $hro->Dia : 'Nuevo Registro'; ?>
</h1>

<ol class="breadcrumb">
    <li><a href="?c=Horario">Dia</a></li>
    <li class="active">
        <?php echo $hro->HorarioID != null ? $hro->Dia : 'Nuevo Registro'; ?>
    </li>
</ol>

<form id="frm-horario" action="?c=Horario&a=Guardar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $hro->HorarioID; ?>" />
    <div class="form-group">
        <label>Dia:</label>
        <input type="text" name="Aula" value="<?php echo $hro->Dia; ?>" class="form-control" placeholder="Ingrese dia"
            data-validacion-tipo="requerido|min:1" />
    </div>


    <div class="form-group">
        <label>Hora de inicio:</label>
        <input type="time" name="Capacidad" value="<?php echo $hro->Hora_inicio; ?>" class="form-control" placeholder="Ingrese la Capacidad"
            data-validacion-tipo="requerido|min:1" />
    </div>
    <div class="form-group">
        <label>Hora de finalizacion:</label>
        <input type="time" name="Capacidad" value="<?php echo $hro->Hora_fin; ?>" class="form-control" placeholder="Ingrese la Capacidad"
            data-validacion-tipo="requerido|min:1" />
    </div>


    <hr />

    <div class="text-right">
        <button class="btn btn-success">Guardar</button>
    </div>
</form>

<script>
    $(document).ready(function() {
        $("#frm-horario").submit(function() {
            return $(this).validate();
        });
    })
</script>