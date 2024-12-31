<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solicitudes Pendientes</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Solicitudes de Alumnos Pendientes</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID Solicitud</th>
                    <th>Nombre del Alumno</th>
                    <th>Correo Electrónico</th>
                    <th>Fecha de Solicitud</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Juan Pérez</td>
                    <td>juan.perez@example.com</td>
                    <td>2023-10-01</td>
                    <td>
                        <button class="btn btn-primary btn-sm">Descargar</button>
                        <button class="btn btn-secondary btn-sm">Subir</button>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>María López</td>
                    <td>maria.lopez@example.com</td>
                    <td>2023-10-02</td>
                    <td>
                        <button class="btn btn-primary btn-sm">Descargar</button>
                        <button class="btn btn-secondary btn-sm">Subir</button>
                    </td>
                </tr>
                <!-- Agrega más filas según sea necesario -->
            </tbody>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>