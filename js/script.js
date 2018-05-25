// Dísponivel no GitHub: https://github.com/vitormarcelino/codingdojo2018.1

var fistItem = 0;
var lastItem = 3;
var itensPerPage = 4;
var page = 1;

function renderCarousel() {
    console.log(fistItem + ' ' + lastItem);
    $('.item').each(function(index) {
        if(fistItem <= index && index <= lastItem) {
            $(this).removeClass('hidden');
        } else {
            $(this).addClass('hidden');
        }
    });
    
    var indicatorsList = $(".carousel-indicators > ol");
    var indicators = '';
    for (var i = 1; i <= $('.item').length/itensPerPage; i++) {
        indicators += '<li class="carousel-dot" data-page="'+i+'"></li>';
    }
    indicatorsList.html(indicators);
    $('.carousel-dot').on('click', function() {
        page = $(this).data('page');
        fistItem = ($('.item').length/itensPerPage + 1) * (page-1);
        lastItem = fistItem + (itensPerPage-1);
        renderCarousel();
    });
    
    $('.carousel-dot').each(function(index) {
        if(index == (page - 1)) {
            $(this).addClass('active');
        } else {
            $(this).removeClass('active');
        }
    });
    
    if(page == 1){
        $('.left').addClass('hidden');
    } else {
        $('.left').removeClass('hidden');
    }
    
    if(page == ($('.item').length/itensPerPage)){
        $('.right').addClass('hidden');
    } else {
        $('.right').removeClass('hidden');
    }
}

$('.right').on('click', function() {
    page++;
    fistItem += itensPerPage;
    lastItem += itensPerPage;
    renderCarousel();
});

$('.left').on('click', function() {
    page--;
    fistItem -= itensPerPage;
    lastItem -= itensPerPage;
    renderCarousel();
});

function init() {
    $.ajax({
        url: 'dados.json',
        type: "GET"
    }).done(function(dados) {
        var carouselElements = $("#myCarousel > .row");
        $.each(dados, function(key, item) {
            carouselElements.append(`<div class="four-columns item hidden">
                                        <a href="detalhes.html?id=`+key+`">
                                            <img src="images/` + item.foto + `" alt="` + item.nome + `">
                                        </a>
                                        <div class="carousel-caption">
                            				<h3>` + item.nome + `</h3>
                          				</div>
                                    </div>`);
        });
        renderCarousel();
    });
}

init();