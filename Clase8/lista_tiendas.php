<?php
/**
 * Created by Clase8.
 * User: chalosalvador
 * Date: 6/6/17
 * Time: 18:07
 */
session_start();

?>

<html>
<head>

</head>
<body>
<div>
	<h1>Bienvenido <?php echo $_SESSION['usuario']['nombre'] ?></h1>


    <div>
        <table>
            <thead>
            <tr>
                <th>Nombre</th>
                <th>Dirección</th>
                <th>Propietario</th>
            </tr>
            </thead>

            <tbody>
            <tr>
                <td><a href="detalle_tienda.php?id_tienda=1">Tienda1</a></td>
                <td>Calle</td>
                <td>Usuario1</td>
            </tr>

            <tr>
                <td><a href="detalle_tienda.php?id_tienda=2">El Gato</a></td>
                <td>Florencia</td>
                <td>Usuario 2</td>
            </tr>

            <tr>
                <td><a href="detalle_tienda.php?id_tienda=3">La espiga</a></td>
                <td>Maldonado</td>
                <td>Usuario 3</td>
            </tr>
            </tbody>
        </table>
    </div>


    <div>
        <ul>
            <li>
                Comentario 1
                <ul>
                    <li>Respuesta 1.1</li>
                    <li>Respuesta 1.2</li>
                    <li>
                        Respuesta 1.3

                        <ul>
                            <li>Respuessta 1.3.1</li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li>Comentario 2</li>
            <li>Comentario 3</li>
            <li>Comentario 4</li>
        </ul>
    </div>
</div>
</body>
</html>
