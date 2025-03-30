// Remova qualquer evento que possa estar bloqueando o clique
document.getElementById('itens').addEventListener('click', function(e) {
    e.stopPropagation(); // Só se necessário
    // Não use e.preventDefault() aqui!
});