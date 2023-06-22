<?php
include '../includes/funciones/db_conexion.php';

if(!empty($_GET['puntuacion'])){
    $puntuacion = $_GET['puntuacion'];
    $desarrollador = $_GET['desarrolador'];
    $genero_id = $_GET['genero_id'];

    $producto_id = $mysqli->query('SELECT id FROM productos ORDER BY id DESC');
    $id=$producto_id->fetch_array(MYSQLI_ASSOC);

    $consulta = 'INSERT INTO datos(puntuacion, desarrolador, genero_id, producto_id) VALUES ('.$puntuacion.',"'. $desarrollador.'",'.$genero_id.', '.$id['id'].')';
    
    if ($mysqli->query($consulta) === TRUE) {
        echo "El juego se creó correctamente.";
        header('Location: /admin/');
    } else {
        echo "Error al crear el juego: " . $mysqli->error;
    }
}else{

    $sql = "SELECT * FROM generos";
    $result = $mysqli->query($sql);
}
include("../includes/templates/header.php");
?>
<section class="home-section">
    <main class="contenedor container px-5">

        <h2>Datos Generales</h2>

        <form action="crear2.php">
            <table width="540">
                <tr valign="top">
                    <td width="500">Puntuacion</td>
                    <td width="414"><input type="number" id="puntuacion" name="puntuacion" placeholder="Puntuacion"></td>
                </tr>

                <tr valign="top">
                    <td>Desarrollador:</td>
                    <td><input type="text" id="desarrolador" name="desarrolador"></input></td>
                </tr>

                <tr valign="top">
                    <td>Genero:</td>
                    <td width="414">
                        <select name="genero_id">
                        <?php
                            if ($result->num_rows > 0) {
                                while($gen = $result->fetch_assoc()) {
                                    ?>
                                    <option value="<?php echo $gen['id']; ?>"><?php echo $gen['nombre']; ?></option>
                                    <?php
                                }
                            }
                        ?>
                        </select>
                    </td>
                </tr>
            </table>
            <input name="restablecer" type="reset" id="restablecer" value="Restablecer">
            <button type="submit" name="enviar" id="enviar">Registrarse</button>
        </form>
    </main>
</section>