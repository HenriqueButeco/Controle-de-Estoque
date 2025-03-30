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

    if (senha.length < 6) {
        alert("A senha deve ter pelo menos 6 caracteres.");
        return false;
    }

    return true;
}