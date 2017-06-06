<?php
/**
 * Created by Clase8.
 * User: chalosalvador
 * Date: 6/6/17
 * Time: 17:15
 */

session_start();

// TODO verificar si la session ya existe para redirigir a la pagina de inicio

if (isset($_SESSION['usuario']))
    header('Location: lista_tiendas.php');


if($_POST) {

    $usuario = $_POST['usuario'];
    $clave = $_POST['clave'];

    if ($usuario != "" && $clave != "") {

        $conn = new mysqli( 'localhost', 'root', '', 'clase8' );

	    if ( $conn->error ) {
		    echo 'Error de conexión: ' . $conn->error;
	    } else {
	        $clave_md5 = md5($clave);
		    $sql = "SELECT * 
                    FROM usuario
                    WHERE usuario = '$usuario'
                    AND clave = '$clave_md5'";

		    $res = $conn->query( $sql );

		    if ($res->num_rows === 1) {
		        while ($row = $res->fetch_assoc()) {
			        $_SESSION['usuario'] = [
			                'id' => $row['id'],
			                'usuario' => $row['usuario'],
                            'nombre' => $row['nombre']
                    ];
                }

                header('Location: lista_tiendas.php');
		        exit;
            } else {
		        echo 'Usuario o contraseña incorrecta!';
            }
	    }
    } else {
        echo 'Ingrese sus datos para iniciar sesión';
    }
}
?>
<html>
<head></head>
<body>
<form action="" method="post">
	<div>
		<label for="usuario">Usuario</label>
		<input type="text" name="usuario" id="usuario">
	</div>

	<div>
		<label for="clave">Clave</label>
		<input type="password" name="clave" id="clave">
	</div>

	<div>
		<button>Ingresar</button>
        <a href="registro_usuario.php">Registrar usuario</a>
	</div>
</form>
</body>
</html>
