function validarFormulario() {
    var email = document.querySelector('input[name="email"]').value;
    var senha = document.querySelector('input[name="senha"]').value;

    if (email == "") {
        alert("Por favor, insira seu e-mail.");
        return false;
    }

    if (senha == "") {
        alert("Por favor, insira sua senha.");
        return false;
    }

    return true;
}