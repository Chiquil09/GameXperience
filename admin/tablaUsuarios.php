<table class="propiedades">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titulo</th>
                    <th>Imagen</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody> <!--MOSTRAR LOS RESULTADOS -->
                <?php while ($productos = mysqli_fetch_assoc($resultado)) : ?>
                    <tr>
                        <th><?php echo $productos['id']; ?></th>
                        <th><?php echo $productos['nombre']; ?></th>
                        <th><img src="<?php echo App; ?>/imagenes/<?php echo $productos['imagen']; ?>" class="imagen-tabla"></th>
                        <th><?php echo $productos['precio']; ?></th>
                        <th>
                            <a href=" <?php echo App; ?>/admin/actualizar.php?id=<?php echo $productos['id'];?>" class="boton-verde-block">
                            Actualizar <i class="bi bi-arrow-up-square-fill"></i></a>
                            <br>
                            <form method="POST" class="w-100">
                                <input type="hidden" name="id" value="<?php echo $productos['id']; ?>">
                                <input type="submit" class="boton-rojo-block" value="Eliminar" class="w-100">
                            </form>
                        </th>
                    </tr>
                <?php endwhile; ?>


            </tbody>
        </table>