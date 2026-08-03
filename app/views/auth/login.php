<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
</head>
<body>

    <h1>Iniciar sesión</h1>

    <form action="/login" method="POST">

        <div>
            <label for="email">Correo electrónico</label><br>
            <input
                type="email"
                id="email"
                name="email"
                required
            >
        </div>

        <br>

        <div>
            <label for="password">Contraseña</label><br>
            <input
                type="password"
                id="password"
                name="password"
                required
            >
        </div>

        <br>

        <button type="submit">
            Ingresar
        </button>

    </form>

</body>
</html>