function validate_fields() {
    erro = 0;
    $("#preenchimento").css("color", "#ff000087");
    $("#nome").css('border-color', '');
    $("#celular").css('border-color', '');
    $("#cpf").css('border-color', '');
    $("#email").css('border-color', '');
    $("#senha").css('border-color', '');
    $("#confirmasenha").css('border-color', '');
    $("#preenchimento").text("");

    if ($("#nome").val() === 0 || $("#nome").val() === '') {
        $("#nome").css('border-color', '#ff000087');
        erro++;
    }
    if ($("#celular").val() === 0 || $("#celular").val() === '') {
        $("#celular").css('border-color', '#ff000087');
        erro++;
    }
    if ($("#cpf").val() === 0 || $("#cpf").val() === '') {
        $("#cpf").css('border-color', '#ff000087');
        erro++;
    }
    if ($("#email").val() === 0 || $("#email").val() === '') {
        $("#email").css('border-color', '#ff000087');
        erro++;
    }
    if ($("#senha").val() === 0 || $("#senha").val() === '') {
        $("#senha").css('border-color', '#ff000087');
        erro++;
    }
    if ($("#confirmasenha").val() === 0 || $("#confirmasenha").val() === '') {
        $("#confirmasenha").css('border-color', '#ff000087');
        erro++;
    }
    if (erro > 0) {
        $("#preenchimento").text("Todos os campos devem ser preenchidos");
    }

    if ($("#cpf").val().length !== 14) {
        $("#preenchimento").text("Necessario inserir um CPF valido");
        erro++;
    }

    if ($("#confirmasenha").val() !== $("#senha").val()) {
        $("#preenchimento").text("Senhas não correspondem, por favor confirme sua senha");
        $("#senha").css('border-color', '#ff000087');
        $("#confirmasenha").css('border-color', '#ff000087');
        erro++;
    }

    var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if (!filter.test($("#email").val())) {
        $("#preenchimento").text("Necessario Inserir um e-mail valido");
        erro++;
    }

    if (erro === 0) {
        let settings = {
            "async": true,
            "crossDomain": true,
            "url": "http://localhost/rei_do_ovo/cadastro/cadastrar.php",
            "method": "POST",
            "headers": {
                "content-type": "application/x-www-form-urlencoded"
            },
            "data": {
                "nome": $("#nome").val(),
                "celular": $("#celular").val(),
                "cpf": $("#cpf").val(),
                "email": $("#email").val(),
                "senha": $("#senha").val(),
                "confirmasenha": $("#confirmasenha").val()
            }
        };

        $.ajax(settings).done(function (response) {
            $("#formContent").html(`
                <h2 class="active">Cadastro</h2>
                <div class="fadeIn first">
                    <form method="POST" id="form_register" action="../login">
                        <h2 class="text-success">Cadastrado com Sucesso</h2>
                        <br>
                        <h4 class="text-success">Bem-Vindo</h4>
                        <h6 class="col-form-label text-success">Você ja pode fazer login na sua conta</h6>
                        <button type="submit" class="btn btn-primary btn-round">Entrar</button>
                        <br><br><br>
                    </form>
                </div>
            `);
        }).fail(function (response) {
            if (response.status === 403){
                $("#preenchimento").text(response.responseJSON["erro"]);
                $("#confirmasenha").css('border-color', '#ff000087');
            }
            if (response.status === 406){
                $("#formContent").html(`
                <h2 class="active">Cadastro</h2>
                <div class="fadeIn first">
                    <form method="POST" id="form_register" action="../login">
                    <h4 class="text-danger">Atenção</h4>
                    <h5 class="text-danger">Já existe um usuario cadastrado com estes dados em nossa base</h5>
                    <h6 class="col-form-label text-danger">Você ja pode fazer login na sua conta</h6>
                    <button type="submit" class="btn btn-primary btn-round">Entrar</button>
                    <br><br>
                    <div id="formFooter">
                        <a class="underlineHover" href="#">Esqueceu a senha?</a>
                    </div>
                    </form>
                </div>

                `);
            }
        });
    }
}