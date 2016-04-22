<?php
@session_start();
//include("paginas/tiempo.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="es" xml:lang="es">
    <head>
        <title>Variedades Jaqueline</title>
        <link rel="icon" type="image/png" href="img/tienda-online.jpg"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
        <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
        <link rel="stylesheet" type="text/css" href="css/design.css" media="all">
        <script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.js"></script>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css" media="all">
        <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css" media="all">
        <script type="text/javascript" src="js/bootbox.js"></script>
        <script type="text/javascript" src="js/jquery-1.8.2.min.js"></script>
        <script type="text/javascript" src="js/jquery.maskedinput.min.js"></script>
        <script type="text/javascript" src="js/jquery.form-validator.js"></script>
        <script type="text/javascript" src="js/jquery-ui.min.js"></script>
        <link rel="stylesheet" type="text/css" href="css/jquery-ui.min.css" media="all"/>
        <link rel="stylesheet" type="text/css" href="css/bootstrap-multiselect.css" media="all">
        <script type="text/javascript" src="js/bootstrap-multiselect.js"></script>
        <script type="text/javascript" src="js/bootstrap-multiselect-collapsible-groups.js"></script>
    </head>
    <body>
        <div class="panel panel-primary" id="body-reportes">
            <?php include("paginas/header.php"); ?>
            <?php include("paginas/nav_bar.php"); ?>
            <!--     
            <br>
            <br>
            <div class="panel-body">
            -->
                <section id="general-reportes">
                    <script type="text/javascript">
                        //funcion para mostrar el calendario
                        $.datepicker.regional['es'] = {
                            closeText: 'Cerrar',
                            prevText: '<Anterior',
                            nextText: 'Siguiente>',
                            currentText: 'Hoy',
                            monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                            monthNamesShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
                            dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
                            dayNamesShort: ['Dom', 'Lun', 'Mar', 'Mié', 'Juv', 'Vie', 'Sáb'],
                            dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sá'],
                            weekHeader: 'Sm',
                            dateFormat: 'yy-mm-dd',
                            maxDate: '0d',
                            firstDay: 1,
                            changeMonth: true,
                            changeYear: true,
                            isRTL: false,
                            yearRange: '-100:+0',
                            showMonthAfterYear: false,
                            yearSuffix: ''
                        };
                        $.datepicker.setDefaults($.datepicker.regional['es']);
                        $(document).ready(function () {
                            $('input[type=date]').datepicker();
                        });
                    </script>
                    <?php
                    include(MODULO_PATH_REPORT . "/" . $conf[$modulo]['archivo']);
                    ?> 
                </section>
            <!--     
            </div>
            <br>
            <br>
            -->
            <?php //include('paginas/footer.php'); ?>
        </div>
    </body>
</html>