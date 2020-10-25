<!DOCTYPE html>
<html>
<head>
    <title>Login Admin</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="estilos/style.css">
    <script src="js/valida_form.js"></script>
</head>
<body>

<h3>Login</h3>

<div>
  <form action="loginController.php" method="POST" onsubmit="return validacionForm()">
    <label for="email">Email</label>
    <input type="text" id="email" name="email" placeholder="Tú email..." >

    <label for="psswd">Password</label>
    <input type="password" id="psswd" name="psswd" placeholder="Tú contraseña..." >
  
    <input id="submit" type="submit" value="Iniciar sesión">
  </form>
</div>

</body>
</html>