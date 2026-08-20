<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
</head>
<body>

    <h1>Registro</h1>

    <form action="registro" method="POST">

        <div>
            <label for="name">Nombre</label><br>
            <input
                type="name"
                id="name"
                name="name"
                required
            >
        </div>

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
            Registrarse
        </button>

        <br><br>
        <a href="login">Ya tengo una cuenta</a>

    </form>

</body>
</html>