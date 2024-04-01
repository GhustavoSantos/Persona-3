// Obtém o elemento select de gênero
const selectGenero = document.getElementById('genero');
// Obtém o elemento header
const header = document.getElementById('header');
// Obtém o elemento botão
const submitBtn = document.getElementById('submitBtn');
// Obtém o elemento footer
const footer = document.getElementById('footer');

// Adiciona um evento de mudança ao elemento select
selectGenero.addEventListener('change', function() {
    // Obtém o valor selecionado
    const generoSelecionado = selectGenero.value;

    // Verifica o valor selecionado e ajusta o estilo dos elementos
    if (generoSelecionado === 'feminino') {
        header.style.backgroundColor = '#ff4081'; // Rosa forte
        submitBtn.style.backgroundColor = '#ff4081'; // Rosa forte
        footer.style.backgroundColor = '#ff4081'; // Rosa forte
    } else if (generoSelecionado === 'masculino') {
        header.style.backgroundColor = '#0044cc'; // Azul
        submitBtn.style.backgroundColor = '#0044cc'; // Azul
        footer.style.backgroundColor = '#0044cc'; // Azul
    } else {
        // Para qualquer outro gênero, definir cor neutra padrão
        header.style.backgroundColor = '#999'; // Cor neutra
        submitBtn.style.backgroundColor = '#999'; // Cor neutra
        footer.style.backgroundColor = '#999'; // Cor neutra
    }
});
