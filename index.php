<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión</title>
    <style>

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: auto;
            background: linear-gradient(315deg, #74ebd5, #ACB6E5, #74ebd5, #ACB6E5);
            animation: gradient 15s ease infinite;
            background-size: 400% 400%;
            background-attachment: fixed;
        }

        @keyframes gradient {
            0% {
                background-position: 0% 0%;
            }
            50% {
                background-position: 100% 100%;
            }
            100% {
                background-position: 0% 0%;
            }
        }

        .container {
            width: 400px;
            padding: 30px;
            background: #fff;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            text-align: center;
            transform: scale(1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .container:hover {
            transform: scale(1.05);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
        }

        h2 {
            margin-bottom: 20px;
            color: #333;
            font-size: 2em;
            font-weight: bold;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 5px;
            color: #555;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"],
        input[type="submit"] {
            padding: 15px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
            font-size: 16px;
            transition: all 0.3s ease;
        }

        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="password"]:focus {
            border-color: #74ebd5;
            box-shadow: 0 0 10px rgba(116, 235, 213, 0.5);
        }

        input[type="submit"] {
            background: #74ebd5;
            color: #666;
            font-weight: bold;
            border: none;
            cursor: pointer;
            transition: background 0.3s ease, transform 0.3s ease;
        }

        input[type="submit"]:hover {
            background: #ACB6E5;
            transform: scale(1.04);
        }

        .error {
            color: #dc3545;
            font-size: 14px;
            margin-top: 5px;
            text-align: center;
        }

    </style>
</head>

<body>
    <div class="container">
        <h2>Iniciar Sesión</h2>
        <?php
        // Mostrar mensaje de error si existe
        if (isset($_GET['error'])) {
            echo '<p class="error">' . $_GET['error'] . '</p>';
        }
        ?>
        <form action="procesar.php" method="post">
            <label for="name" hidden>Nombre</label>
            <input type="text" name="name" id="name" placeholder="Nombre" autocomplete="off" required><br>
    
            <label for="email" hidden>Email:</label>
            <input type="email" id="email" name="email" placeholder="Email" autocomplete="off" required><br>
    
            <label for="contrasena" hidden>Contraseña:</label>
            <input type="password" id="contrasena" name="contrasena" placeholder="Contraseña" autocomplete="off" required><br>
    
            <input type="submit" value="Iniciar Sesión">
        </form>
    </div>

    <script>
        function validateEmail() {
            var email = document.getElementById('email').value;
            var emailsList = document.getElementById('emails').value.split(',');
            if (emailsList.indexOf(email) !== -1) {
                alert('El email ingresado ya está registrado. Por favor, ingresa otro email.');
                return false;
            }
            return true;
        }
    </script>

</body>
</html>
