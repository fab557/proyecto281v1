<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center">
                        <h4>Registro de Usuario</h4>
                    </div>
                    <div class="card-body">
                        <form method="post" action="<?= site_url('registro/registrar') ?>" id="registroForm">
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input type="text" name="nombre" id="nombre" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="correo">Correo</label>
                                <input type="email" name="correo" id="correo" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Contraseña</label>
                                <input type="password" name="password" id="password" class="form-control" required>
                                <small id="passwordHelp" class="form-text text-muted">
                                    La contraseña debe tener al menos 8 caracteres, una letra mayúscula y una letra minúscula.
                                </small>
                            </div>
                            <div class="form-group">
                                <label for="rol">Selecciona tu rol</label>
                                <select name="rol" id="rol" class="form-control" required>
                                    <option value="cliente">Cliente</option>
                                    <option value="artesano">Artesano</option>
                                    <option value="repartidor">Repartidor</option>
                                </select>
                            </div>
                            <div class="form-group" id="ubicacion-group" style="display: none;">
                                <label for="ubicacion">Ubicación</label>
                                <input type="text" name="ubicacion" id="ubicacion" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Registrarse</button>
                        </form>
                    </div>
                    <div class="card-footer text-center">
                        <a href="<?= site_url('login') ?>">¿Ya tienes cuenta? Inicia sesión aquí</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        $(document).ready(function() {
            $('#rol').change(function() {
                if ($(this).val() === 'artesano') {
                    $('#ubicacion-group').show();
                    $('#ubicacion').attr('required', true); // Hace que el campo sea obligatorio
                } else {
                    $('#ubicacion-group').hide();
                    $('#ubicacion').attr('required', false); // Remueve la obligatoriedad si no es artesano
                }
            });

            $('#registroForm').submit(function(event) {
                const password = $('#password').val();
                const hasUpperCase = /[A-Z]/.test(password);
                const hasLowerCase = /[a-z]/.test(password);
                const isValidLength = password.length >= 8;

                if (!hasUpperCase || !hasLowerCase || !isValidLength) {
                    event.preventDefault(); // Previene el envío del formulario
                    alert('La contraseña debe tener al menos 8 caracteres, una letra mayúscula y una letra minúscula.');
                }
            });
        });
    </script>
</body>
</html>
