<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" type="image/x-icon" href="../assets/img/favicon.ico">
    <title>Rei do Ovo</title>
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/login.css" rel="stylesheet">
    <script src="../assets/js/plugins/jquery_2.1.1.js"></script>
    <script src="../assets/js/plugins/jquery_mask_1.14.11.js"></script>
    <script src="../assets/js/custom_js/validate_fields.js"></script>
    <script src="../assets/js/custom_js/validate_login.js"></script>
</head>

<body class="text-center">
<div class="wrapper fadeInDown">
    <div id="formContent">
        <h2 class="active">Entrar</h2>
        <a href="../cadastro"><h2 class="inactive underlineHover">Cadastrar</h2></a>

        <div class="fadeIn first">

        <form method="POST" action="../examples/dashboard.html">
            <h3 class="col-form-label" id="preenchimento"></h3>
            <input type="text" id="cpf" class="fadeIn second valida_cpf" name="cpf" placeholder="CPF">
            <input type="password" id="senha" class="fadeIn third" name="senha" placeholder="Senha">
            <input type="button" class="fadeIn fourth" value="Entrar" onclick="validate_fields()">
        </form>

        <div id="formFooter">
            <a class="underlineHover" href="#">Esqueceu a senha?</a>
        </div>

    </div>
</div>
</body>
</html>
