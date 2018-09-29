<h1 class="page-header">
    <?php echo $asignar->RelacionID != null ? $asignar->RelacionID : 'Nuevo Registro'; ?>
</h1>

<ol class="breadcrumb">
    <li><a href="?c=Asignacion">Profesor</a></li>
    <li class="active">
        <?php echo $asignar->RelacionID != null ? $asignar->RelacionID : 'Nuevo Registro'; ?>
    </li>
</ol>

<form id="frm-Asignacion" action="?c=RelacionID&a=Guardar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $asignar->RelacionID; ?>" />

    <!--<div class="form-group">
        <label>Nombre</label>
        <input type="text" name="Nombre" value="<?php echo $asignar->AulaID; ?>" class="form-control" placeholder="Ingrese su nombre"
            data-validacion-tipo="requerido|min:3" />
    </div>-->

    <div class="form-group">
        <label for="IdRol">Aula</label>
            <select class="form-control" name="idrol" id="AulaID">
                <?php foreach ($this->model->ListarAula() as $p): ?>
                <option value="<?php echo $p->AulaID; ?>">
                    <?php echo $p->Aula; ?>
                </option>
                <?php endforeach;?>
            </select>
    </div>

    <div class="form-group">
        <label for="IdRol">Asignatura</label>
            <select class="form-control" name="idrol" id="AsignaturaID">
                <?php foreach ($this->model->ListarAsignatura() as $p): ?>
                <option value="<?php echo $p->AsignaturaID; ?>">
                    <?php echo $p->Asignatura; ?>
                </option>
                <?php endforeach;?>
            </select>
    </div>

    <div class="form-group">
        <label for="IdRol">Horario</label>
            <select class="form-control" name="idrol" id="HorarioID">
                <?php foreach ($this->model->ListarHorario() as $p): ?>
                <option value="<?php echo $p->HorarioID; ?>">
                    <?php echo $p->Hora_inicio; ?>
                </option>
                <?php endforeach;?>
            </select>
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