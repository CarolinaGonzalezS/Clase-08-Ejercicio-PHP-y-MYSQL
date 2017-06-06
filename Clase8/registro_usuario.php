<?php
/**
 * Created by Clase8.
 * User: chalosalvador
 * Date: 6/6/17
 * Time: 17:15
 */


if($_POST) {
	$nombre = $_POST['nombre'];
	$usuario = $_POST['usuario'];
	$clave = $_POST['clave'];
	$repetir_clave = $_POST['repetir_clave'];

	if($nombre != "" && $usuario != "" && $clave != "" && strlen($clave) > 7) {

		if($clave === $repetir_clave) {

			$conn = new mysqli( 'localhost', 'root', '', 'clase8' );

			if ( $conn->error ) {
				echo 'Error de conexión: ' . $conn->error;
			} else {
				$sql = "SELECT id 
						FROM usuario
						WHERE usuario = '$usuario'";

				$res = $conn->query( $sql );

				if ( $res->num_rows > 0 ) {
					echo 'El nombre de usuario ya existe.';
				} else {

					$sql_insert = "INSERT INTO usuario
								   (nombre, usuario, clave)
								   VALUES ('$nombre', '$usuario', MD5('$clave'))";

					$insert = $conn->query( $sql_insert );

					if ( $conn->error ) {
						echo "Ocurrió un error al insertar " . $conn->error;
					} else {
					    echo 'El usuario se ha registrado correctamente.';
                    }
				}
			}
		} else {
			echo 'Las claves no coinciden';
		}
	} else {
		echo 'Ingrese todos los datos';
	}

}
?>

<html>
<head></head>
<body>
<form action="" method="post">

	<div>
		<label for="nombre">Nombre: </label>
	<input type="text" name="nombre" id="nombre">
	</div>

	<div>
		<label for="usuario">Usuario: </label>
		<input type="text" name="usuario" id="usuario">
	</div>

	<div>
		<label for="clave">Clave: </label>
		<input type="password" name="clave" id="clave">
	</div>

	<div>
		<label for="repetir_clave">Repetir clave</label>
		<input type="password" name="repetir_clave" id="repetir_clave">
	</div>

	<div>
		<button>Registrar</button>
	</div>
</form>
</body>
</html>
