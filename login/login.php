<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <!--<link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico"> -->

    <title>Rei do Ovo</title>
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/login.css" rel="stylesheet">
</head>

<body class="text-center">
<div class="wrapper fadeInDown">
    <div id="formContent">
        <h2 class="active">Entrar</h2>
        <a href="cadastro.php"><h2 class="inactive underlineHover">Cadastrar</h2></a>

        <div class="fadeIn first">

        <form method="POST" action="../examples/dashboard.html">
            <input type="text" id="login" class="fadeIn second" name="login" placeholder="Usuário">
            <input type="password" id="password" class="fadeIn third" name="login" placeholder="Senha">
            <input type="submit" class="fadeIn fourth" value="Entrar">
        </form>

        <div id="formFooter">
            <a class="underlineHover" href="#">Esqueceu a senha?</a>
        </div>

    </div>
</div>
</body>
</html>
