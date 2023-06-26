<footer class="d-flex flex-wrap justify-content-between align-items-center p-3">
  <div class="col-md-4 d-flex align-items-center">
    <span class="mb-3 mb-md-0 text-body-secondary"><?php echo date("Y"); ?> GameXperience, Games</span>
  </div>
  <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
    <i class="bi bi-xbox p-2"></i>
    <i class="bi bi-youtube p-2"></i>
    <i class="bi bi-unity p-2"></i>
    <i class="bi bi-twitter p-2"></i>
  </ul>
</footer>
</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  function confirmAlerta(event) {
    event.preventDefault(); // Evita que el formulario se envíe automáticamente

    Swal.fire({
      title: '¿Estás seguro?',
      text: 'Que quieres elinimar este juego',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Eliminar',
      cancelButtonText: 'Cancelar',
      allowOutsideClick: false, // Evita que el usuario cierre la ventana haciendo clic fuera de ella
    }).then((result) => {
      if (result.isConfirmed) {
        // Aquí puedes realizar la eliminación del registro o cualquier otra acción
        // Una vez que el usuario confirma la acción
        event.target.submit(); // Envía el formulario después de la confirmación
      }
    });
  }

  function eliminarusuario(event) {
    event.preventDefault(); // Evita que el formulario se envíe automáticamente

    Swal.fire({
      title: '¿Estás seguro?',
      text: 'Que quieres elinimar este administrador',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Eliminar',
      cancelButtonText: 'Cancelar',
      allowOutsideClick: false, // Evita que el usuario cierre la ventana haciendo clic fuera de ella
    }).then((result) => {
      if (result.isConfirmed) {
        // Aquí puedes realizar la eliminación del registro o cualquier otra acción
        // Una vez que el usuario confirma la acción
        event.target.submit(); // Envía el formulario después de la confirmación
      }
    });
  }

  function actualizar(event) {
    event.preventDefault(); // Evita que el formulario se envíe automáticamente

    Swal.fire(
      'Actualizado!',
      'Corectamente!',
      'success'
    ).then((result) => {
      if (result.isConfirmed) {
        // Aquí puedes realizar la eliminación del registro o cualquier otra acción
        // Una vez que el usuario confirma la acción
        event.target.submit(); // Envía el formulario después de la confirmación
      }
    });
  }
  function nuevojuego(event) {
    event.preventDefault(); // Evita que el formulario se envíe automáticamente

    Swal.fire(
      'Creado!',
      'Corectamente!',
      'success'
    ).then((result) => {
      if (result.isConfirmed) {
        // Aquí puedes realizar la eliminación del registro o cualquier otra acción
        // Una vez que el usuario confirma la acción
        event.target.submit(); // Envía el formulario después de la confirmación
      }
    });
  }
  function nuevacategoria(event) {
    event.preventDefault(); // Evita que el formulario se envíe automáticamente

    Swal.fire(
      'Creado!',
      'Corectamente!',
      'success'
    ).then((result) => {
      if (result.isConfirmed) {
        // Aquí puedes realizar la eliminación del registro o cualquier otra acción
        // Una vez que el usuario confirma la acción
        event.target.submit(); // Envía el formulario después de la confirmación
      }
    });
  }
  function nuevoadmin(event) {
    event.preventDefault(); // Evita que el formulario se envíe automáticamente

    Swal.fire(
      'Creado!',
      'Corectamente!',
      'success'
    ).then((result) => {
      if (result.isConfirmed) {
        // Aquí puedes realizar la eliminación del registro o cualquier otra acción
        // Una vez que el usuario confirma la acción
        event.target.submit(); // Envía el formulario después de la confirmación
      }
    });
  }
</script>

</body>

</html>