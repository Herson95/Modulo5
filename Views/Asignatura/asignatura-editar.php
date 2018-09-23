<h1 class="page-header">
    <?php echo $asig->AsignaturaID != null ? $asig->Asignatura : 'Nuevo Registro'; ?>
</h1>

<ol class="breadcrumb">
  <li><a href="?c=Asignatura">Asignaturas</a></li>
  <li class="active"><?php echo $asig->AsignaturaID != null ? $asig->Asignatura : 'Nuevo Registro'; ?></li>
</ol>

<form id="frm-asignatura" action="?c=Asignatura&a=Guardar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $asig->AsignaturaID; ?>" />
    
    <div class="form-group">
        <label>Nombre de la Asignatura</label>
        <input type="text" name="Asignatura" value="<?php echo $asig->Asignatura; ?>" class="form-control" placeholder="Ingrese nombre de la asignatura" data-validacion-tipo="requerido|min:3" />
    </div>
    
    <div class="form-group">
        <label>Unidades Valorativas</label>
        <input type="text" name="UV" value="<?php echo $asig->UV; ?>" class="form-control" placeholder="Ingrese unidades valorativas" data-validacion-tipo="requerido|min:1" />
    </div>    
    <hr />
    
    <div class="text-right">
        <button class="btn btn-success">Guardar</button>
    </div>
</form>

<script>
    $(document).ready(function(){
        $("#frm-asignatura").submit(function(){
            return $(this).validate();
        });
    })
</script>