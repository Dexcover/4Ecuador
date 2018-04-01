<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="refresh" content="3;url=index.php"/>
    <title>Contacto 4Ecuador</title>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Roboto:400,500');

        * {
            font-family: 'Roboto', sans-serif;
            font-size: 1.04em;
        }
    </style>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="row" style="padding:20px;">
    <div class="col-md-12">
        <?php
        if ( (!empty($_POST['message'])) && (!empty($_POST['email']))    ) {

            ini_set( 'display_errors', 1 );
            error_reporting( E_ALL );
            $from = $_POST['email'];
            $to = "info@infodesarrollo.ec,diegochicaiza1@hotmail.com,forecuador@hotmail.com";
            $subject = "Mensaje desde 4Ecuador";
            $message = $_POST['message'];;
            $headers = "From:" . $from;

            //send email
            if( mail($to,$subject,$message, $headers)  ){
            //Email response
            ?>
            <div class="alert alert-success" role="alert">Gracias por contactarnos, responderemos tus inquitudes tan pronto sea posible
            </div>
        <?php
            }
            else{
                ?>
                <div class="alert alert-danger" role="alert">Ocurrió un error al enviar el correo
                </div>
                <?php
            }
        } else {
            ?>
            <div class="alert alert-danger" role="alert">Ocurrió un error al enviar la información, los campos requeridos no han sido proporcionados
            </div>
            <?php
        }
        /*}*/
        ?>
    </div>
</div>

</body>
</html>



