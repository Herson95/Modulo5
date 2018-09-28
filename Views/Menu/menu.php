<?php
/**
 * @author David Ticona Saravia
 */
//session_start();

if (!isset($_SESSION['Usuario'])) {
    header('Location:index.php');
}
include "BootstrapMenu.php";
$str = '[ {"text":"' . "Usuario : " . $_SESSION['Usuario'] . '", "href":"#", "title": "Usuario"} , {"text":"Alumnos", "href": "?c=Alumno", "title": "Alumnos"}, {"text":"Aulas", "href": "?c=Aula", "title": "Aulas"}, {"text":"Profesores", "href": "?c=Profesor", "title": "Profesores"}, {"text":"Asignaturas", "href": "?c=Asignatura", "title": "Asignaturas"}, {"text":"Horarios", "href": "?c=Horario", "title": "Horarios"}, {"text":"Asignar Horarios", "href": "?c=AsignarHorario", "title": "Asignar Horarios"}, {"text":"Salir", "href": "?c=Login&a=Logout", "title": "Salir"}  ]';
$qMenu = new BootstrapMenu(array('data' => $str));

$menu = $qMenu->html();?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Ejemplo Quick Menu">
    <meta name="author" content="David Ticona Saravia">
    <title>Escuela</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
        crossorigin="anonymous">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        body {padding-top: 70px};
    </style>
</head>

<body>
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <?php echo $menu ?>
            </div>
        </div>
    </nav>
    <div class="container">
    </div>
    <!-- Placed at the end of the document so the pages load faster -->
    <script async defer src="https://buttons.github.io/buttons.js">
    </script>

    <script>
        window.jQuery || document.write('<script src="../../Assets/js/vendor/jquery.min.js"><\/script>')
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous">
    </script>
</body>

</html>