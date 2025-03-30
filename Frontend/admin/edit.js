function validarFormulario() {
    var marca = document.getElementById('marca').value;
    var colecao = document.getElementById('colecao').value;
    var nomeCor = document.getElementById('nome_cor').value;
    var quantidade = document.getElementById('quantidade').value;

    // Verifica se todos os campos estão preenchidos
    if (marca.trim() === "" || colecao.trim() === "" || nomeCor.trim() === "" || quantidade.trim() === "") {
        alert("Todos os campos devem ser preenchidos.");
        return false;
    }

    // Verifica se a quantidade é um número válido e positivo
    if (isNaN(quantidade) || quantidade <= 0) {
        alert("A quantidade deve ser um número positivo.");
        return false;
    }

    return true;
}