function validate_fields() {
    erro = 0;
    $("#preenchimento").text("");
    $("#preenchimento").css("color", "#ff000087");
    $("#cpf").css('border-color', '');
    $("#senha").css('border-color', '');


    if ($("#cpf").val().length === 0 || $("#cpf").val() === '') {
        $("#cpf").css('border-color', '#ff000087');
        erro++;
    }
    if ($("#senha").val().length === 0 || $("#senha").val() === '') {
        $("#senha").css('border-color', '#ff000087');
        erro++;
    }

    if ($("#cpf").val().length !== 14) {
        $("#preenchimento").text("Necessario inserir um CPF valido");
        erro++;
    }

    if (erro === 0) {
        let settings = {
            "async": true,
            "crossDomain": true,
            "url": "http://localhost/rei_do_ovo/login/login.php",
            "method": "POST",
            "headers": {
                "content-type": "application/x-www-form-urlencoded"
            },
            "data": {
                "cpf": $("#cpf").val(),
                "senha": $("#senha").val(),
            }
        };

        $.ajax(settings).done(function (response) {
            window.location = "../examples/dashboard.html"
        }).fail(function (response) {
            if (response.status === 403){
                $("#preenchimento").text(response.responseJSON["erro"]);
                $("#senha").css('border-color', '#ff000087');
            }
        });
    }
}