function validarFormulario() {
    var marca = document.querySelector('input[name="marca"]').value;
    var colecao = document.querySelector('input[name="colecao"]').value;
    var nomeCor = document.querySelector('input[name="nome_cor"]').value;
    var quantidade = document.querySelector('input[name="quantidade"]').value;

    if (marca === "" || colecao === "" || nomeCor === "" || quantidade === "") {
        alert("Todos os campos devem ser preenchidos.");
        return false;
    }

    if (quantidade <= 0) {
        alert("A quantidade deve ser um número positivo.");
        return false;
    }

    return true;
}