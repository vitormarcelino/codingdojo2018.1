var urlParams = new URLSearchParams(window.location.search);
$.ajax({
    url: 'dados.json',
    type: "GET"
}).done(function(dados) {
    var id = urlParams.get('id');
    if(typeof dados[id] !== 'undefined') {
        var cao = dados[id];
        $('#nome').text(cao.nome);
        $('#especie').text(cao.espécie);
        $('#raca').text(cao.raça);
        $('#cor').text(cao.cor);
        $('#idade').text(cao.idade + ' ano(s)');
        $('#genero').text(cao.sexo);
        var castrado = cao.castrado ? 'Sim' : 'Não';
        $('#castrado').text(castrado);
        $('#img_cao').attr('src', 'images/' + cao.foto);
        
        $.each(cao.vacinas, function(key, item) {
            $('#vacinasList').append('<li>'+ key + '. ' + item + '</li>');
        });

    }
});
