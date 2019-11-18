<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Rei do Ovo</title>
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/login.css" rel="stylesheet">
    <script src="../assets/js/plugins/jquery_2.1.1.js"></script>
    <script src="../assets/js/plugins/jquery_mask_1.14.11.js"></script>
    <script src="../assets/js/custom_js/validate_fields.js"></script>
</head>

<body class="text-center">
<div class="wrapper fadeInDown">
    <div id="formContent">
        <h2 class="active">Cadastrar</h2>
        <a href="../login">
            <h2 class="inactive underlineHover">Entrar</h2>
        </a>
        <div class="fadeIn first">
            <form method="POST" action="cadastrar.php">
                <input type="text" id="login" class="fadeIn second" name="nome" placeholder="Nome">
                <input type="text" id="celular" class="form-control valida_celular" placeholder="Celular" name="celular">
                <input type="text" id="cpf" class="fadeIn second valida_cpf" name="cpf" placeholder="CPF">
                <input type="text" id="usuario" class="fadeIn second" name="usuario" placeholder="Usuário">
                <input type="text" id="email" class="fadeIn third" name="email" placeholder="E-mail">
                <input type="password" id="password" class="fadeIn third" name="senha" placeholder="Senha">
                <input type="password" id="password" class="fadeIn third" name="confirmaSenha" placeholder="Confirme sua Senha">
                <input type="submit" class="fadeIn fourth" value="Cadastrar">
            </form>
            <div id="formFooter">
                <a class="underlineHover" href="#">Esqueceu a senha?</a>
            </div>
        </div>
    </div>
</body>
</html>