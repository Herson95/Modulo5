<!-- Begin page content -->
<h3 class="mt-5">login con PHP PDO y MySQL</h3>
<hr>
<div class="row">
    <div class="col-12 col-md-6">
        <!-- Contenido -->

        <br />
        <?php
if (isset($message)) {
    echo '<label class="text-danger">' . $message . '</label>';
}
?>

        <form id="frm-login" action="?c=Login&a=VerificarUsers" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="Usuario">Usuario</label>
                <input type="text" name="usuario" class="form-control" placeholder="Ingrese usuario" />
            </div>

            <div class="form-group">
                <label for="Contraseña">Contraseña</label>
                <input type="password" name="password" class="form-control" placeholder="Ingrese Contraseña" />
            </div>

            <div class="form-group">
                <label for="IdRol">Rol</label>
                <select class="form-control" name="idrol" id="idrol">
                    <?php foreach ($this->model->ListarRoles() as $p): ?>
                    <option value="<?php echo $p->idrol; ?>">
                        <?php echo $p->Nombre; ?>
                    </option>
                    <?php endforeach;?>
                </select>
            </div>

            <br />
            <button class="btn btn-info">Iniciar Sesion</button>
        </form>

        <!-- Fin Contenido -->
    </div>
</div>

<script>
    $(document).ready(function() {
        $("#frm-login").submit(function() {
            return $(this).validate();
        });
    })
</script>
<!-- Fin row -->

<!-- Fin container -->